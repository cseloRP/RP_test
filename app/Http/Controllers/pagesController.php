<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class pagesController extends Controller{

    public function getIndex(){

        $posts = [];

        if(Auth::check()) {
            $posts = Post::orderBy('id', 'desc')->paginate(5);
        }
        return view('pages.welcome')->with('posts', $posts);
    }

    public function getAbout(){
        return view('pages.about');
    }

    public function getContact(){
        return view('pages.contact');
    }

    public function postContact(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10'
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