<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DataTables;
use App\User;
use App\Invoices;
use Carbon\Carbon;
use Akaunting\Money\Money;
use Form;
use App\Addressbook;
use Cartalyst\Stripe\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect(route('invoice.list'));
    }

    public function checkout()
    {
        $crt=Cart::content();
        foreach($crt as $t)
        {
            $this->checkifpaid($t->id);
        }
        if (Cart::count() < 1)
        {
            return redirect(route('invoice.list'))->with('warning', 'No item in Cart');
        }
        $addbk = new Addressbook;
        $billingadd = $addbk->where([
            ['userid', auth()->user()->id],
            ['address_type', 'billing']
        ])->get();

        $cart = Cart::content();
        return view('portal.checkout', compact('cart', 'billingadd'));
    }

    public function invoice()
    {
        return view('portal.invoice');
    }

    public function getlistdata()
    {
        return DataTables::of(Invoices::query()->where('userid', auth()->user()->id)->get())
            ->setRowClass(function ($data) {
                    return 'row-border';
            })
            ->editColumn('paid', function($request) {
                if( $request->paid == false){
                    $button = Form::Open(['url'=> route('payment.confirm'), 'method'=>'POST']);
                    $button .= Form::hidden('invnum', $request->invnum);
                    $button .= Form::hidden('id', $request->id);
                    $button .= Form::submit('Pay Now', ['class' =>"btn btn-sm btn-success text-right"]);
                    $button .= Form::Close();
                    return $button;
                }
                
            })
            
            ->editColumn('amount', function($request){
                $cur = $request->currency;
                $date = "<div class='text-right mr-4'>" .  Money::$cur($request->amount, true)."</div>";
                return $date;
            })
            ->editColumn('due_date', function($request){
                $date = Carbon::parse($request->due_date)->format('M d, Y');
                return $date;
            })
            ->rawColumns(['paid', 'due_date', 'amount'])
            ->make(true);
    }

    private function checkifpaid($id)
    {
        $inv = Invoices::find($id);
        if ($inv->paid <> null)
        {
            return redirect(route('invoice.list'))->with('warning', 'This was already paid');
        }
    }

    public function confirm(Request $request){
       $this->checkifpaid($request->id);
        Cart::destroy();
        $invoice = New Invoices;
        $inv = $invoice->where([
            ['id', $request->id],   
            ['userid', auth()->user()->id],
            ['invnum', $request->invnum],
            ['paid', null]
            ])->get();

        Cart::add($inv[0]['id'], $inv[0]['invnum'], 1, $inv[0]['amount'], ['currency'=>$inv[0]['currency']]);
        if (Cart::count() > 0)
        {
            return redirect(route('payment.checkout'));
        }
        else
        {
            return redirect()->back()->with('error', 'Please try again');
        }

    }

    public function submitCheckout(Request $request)
    {
        $this->checkifpaid($request->id);
        $contents = Cart::content()->map(function($item){
            return $item->name.', '.$item->qty.', '.$item->price;
        })->values()->toJson();
        
        try{
            $stripe = new Stripe;
            $charge = $stripe->charges()->create([
                'currency' => $request->cart_currency,
                'amount'   => $request->cart_total,
                'source'   => $request->stripeToken,
                'receipt_email' => $request->emailadd,
                'description' => $request->inv,
                'metadata' =>[
                     'contents' => $contents,
                     'quantity' => Cart::instance('default')->count(),

                ]
            ]);
            
           $cart = Cart::content();
           foreach($cart as $t)
           {
                $invoice = Invoices::find($t->id);
                $invoice->paid = 1;
                $invoice->transaction_detail=$charge['id'];
                $invoice->date_paid= NOW();
                $invoice->save();

            }
 
           Cart::destroy();
           return redirect(route('payment.complete'))->with('message', 'transaction_completed');
            
        }
        catch(CardErrorException $e)
        {
            return redirect()->back()->with('error', 'Error - '. $e->getMessage());
        }
    }

    public function complete()
    {
        if(session('message')=="transaction_completed")
        {
            return view('portal.thankyou');
        }
        else
        {
            return redirect(route('invoice.list'));
        }
    }
}
