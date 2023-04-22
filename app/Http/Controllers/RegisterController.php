<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use TijsVerkoyen\CssToInlineStyles\Css\Rule\Rule;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }
    public function store(){
        $attribute = request()->validate([
            'name' => ['required','max:255'],
            'username' => ['required','max:255','min:3','unique:users,username'],
            'email' => ['required','email','max:255','unique:users,email'],
            'password' => ['required','min:7','max:255'],
        ]);

        $user = User::create($attribute);

        // session()->flash('success','Your account has been created.'); we can flash like that but also 
        // we can use ->with('name of the flash','the message want to send') after redirecting like Im gonna do down 

        // to login the user:
        auth()->login($user);
        

        return redirect('/')->with('success','Your account has been created');
    }
}
