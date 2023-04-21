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

        User::create($attribute);

        session()->flash('success','Your account has been created.');

        return redirect('/');
    }
}
