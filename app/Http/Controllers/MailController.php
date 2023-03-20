<?php

namespace App\Http\Controllers;

use App\Mail\ElbaraEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email:dns',
            'message' => 'required',
        ]);
    
        Mail::send('emails.custom', [
            'messages' => $request->message
        ], function($mail) use($request) {
            $mail->from($request->email, $request->name);
    
            // ! Temporary email
            $mail->to('utsmand91@gmail.com')->subject('Elbara Email');
        });

        if(!$request->ajax()) return back();
    }
}
