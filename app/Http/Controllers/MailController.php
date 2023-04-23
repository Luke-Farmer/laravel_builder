<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMessage;
use Mail;

class MailController extends Controller
{
    public function contactPost(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required'
        ]);
        Mail::send('emails.contact-form-content', [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'comment' => $request->get('comment'),
//            'phone' => $request->get('phone'),
            'subject' => $request->get('subject')],
            function ($message) {
                $message->from('enquiry@lukefarmer.co.uk', 'Company Name');
                $message->to('contact@lukefarmer.co.uk', 'Name here')
                    ->subject('New Website Enquiry!');
            });

        return back()->with('success', 'Thanks for contacting me, I will get back to you soon!');

    }
}
