<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create(){
        return view('sessions.create');
    }
    public function store(){
        //validate
        $attributes = request()->validate([
            'email'=>['required','email'],
            'password'=>'required'
        ]);
        //authenticate
        if(auth()->attempt($attributes)){
            //redirect with flash
            return redirect('/')->with('success','welcome back!');
        }else{
            //if validation fails
            return back()
            ->withInput()
            ->withErrors(['email'=>'Your provided credintials could not be verified']);
        }  
    } 

    public function destroy(){
        auth()->logout();

        return redirect('/')->with('success','goodbye');
    }
}

