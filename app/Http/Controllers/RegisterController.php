<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function create(){
        return view('register.create');
    }
    public function store(){
        $attributes = request()->validate([
            'username' => 'required|max:255',
            'name' => 'required',
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);
        User::create($attributes);
        return redirect('/');
    }
}
