<?php

namespace App\Http\Controllers;

use App\Album;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Traits\reCaptchaTrait;

class pagesController extends Controller{

    use reCaptchaTrait;

    public function getIndex(){

        $posts = [];
        $albums = [];
        if(Auth::check()) {
            $posts = Post::orderBy('id', 'desc')->paginate(5);
            $albums = Album::orderBy('id', 'desc')->limit(3);
        }
        return view('pages.welcome', compact('posts', 'albums'));
    }

    public function getAbout(){
        return view('pages.about');
    }

    public function getContact(){
        return view('pages.contact');
    }

    public function postContact(Request $request){

        $request['captcha'] = $this->validateCaptchaResponse();

        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10',
            'g-recaptcha-response'=>'required',
            'captcha'=>'min:1',
        ],
        [
            'captcha.min' => 'Unsuccessful send!',
        ]);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message,
        );

        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('rp+1@mailbox.hu');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Sikeresen elküldted a kontakt üzenetet!');

        return redirect('/');
    }

}