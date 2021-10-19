<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class Website extends Controller
{
    public function index(){
        $data=['name'=>"Kabbo",'data'=>"Hello kabbo"];
        $user['to']='djashmadmax@gmail.com';
        Mail::send('mail',$data,function($messages) use ($user){
            $messages->to($user['to']);
            $messages->subject('Hello Devoloper'); 
        });
    }
}
