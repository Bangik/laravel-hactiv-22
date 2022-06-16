<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function send()
    {
        $details = [
            'title' => 'Test Mail',
            'body' => 'This is a test mail.'
        ];

        try{
            Mail::to('info@hacktiv.com')->send(new \App\Mail\TestMail($details));
            return response()->json(['success' => 'Mail sent successfully.']);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
