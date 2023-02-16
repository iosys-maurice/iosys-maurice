<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\gentokenApi as apiResponse;
use App\NewClient;

class TokengenController extends Controller
{
    public function index()
    {
        return view('products.tokengen.start');
    }

    public function registernew(Request $request)
    {
        if((isset($request->company)) && ($request->company <> ""))
        {
            $nc = NewClient::create($request->all());
            $response = [
                 'new' => true
             ];
         return new apiResponse($response);   
 
        }
        elseif($request->serial <> "serial")
        {
            
        }
        else
        {
            return "";
        }
      
    }

    public function checkLicense(Request $request)
    {

        $data = \base64_decode((substr($request->data, 9)));
        $jdata =  json_decode($data);        
           $response = [
                'available' => true
            ];
        
        // return new apiResponse(mobileEncode($response));   
        
        return new apiResponse(mobileEncap(mobileEncode($response)));   
    }

    public function getupdate(Request $request)
    {

        $data = \base64_decode((substr($request->data, 9)));
        $jdata =  json_decode($data);        
           $response = [
                'release' => 1.11,
                'name'=> 'Test Update Release 1.0',
                'command'=>"cd /var/www/html && mkdir update && cd update",
                'hash' => '123234242-134134142-34534536-362342342', 
                'url'=>'http://iosys.local'
            ];
        return new apiResponse(mobileEncap(mobileEncode($response)));   
    }
}
