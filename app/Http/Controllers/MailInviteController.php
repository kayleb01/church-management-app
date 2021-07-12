<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\InviteMail;
use Illuminate\Support\Facades\Mail;

class MailInviteController extends Controller
{
   
    public function show()
    {
        # code...
    }
    
    public function send(Request $request)
    {
        $this->validate($request, [
            'email' => 'required'
        ]);

        Mail::to($request->email)->send(new InviteMail());  
    }

}
