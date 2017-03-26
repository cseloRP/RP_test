<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Auth;

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

        $name = "Xxx Company";
        $address = "5678 Kisnyék Budapest krt. 112.";
        $email = "xxxcomp@xxx.hu";
        $contact_info = ['name'=>$name,'addr'=>$address,'email'=>$email];
        return view('pages.contact')->with('info', $contact_info);
    }

}