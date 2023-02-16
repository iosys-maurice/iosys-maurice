<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Notification;
use App\Notifications\DefaultNotification;

class GeneralController extends Controller
{
    public function SupportRequest(Request $request)
    {

        $emailinfo =[
            'name' => $request->name,
            'subject' => 'Support Request',
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
        ];

        Notification::route('mail', $request->email)->notify(new DefaultNotification(['view' => 'supportrequest', 'data' => $emailinfo]));
        Notification::route('mail', "maurice_ashman@yahoo.com")->notify(new DefaultNotification(['view' => 'requestmade', 'data' => $emailinfo]));
        Notification::route('mail', "mashman@iosys.com.jm")->notify(new DefaultNotification(['view' => 'requestmade', 'data' => $emailinfo]));

        return redirect(route('support'))->with('success', 'Contact Request Submitted');

    }
}
