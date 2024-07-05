<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class Register extends Component
{
    public $name, $email, $password, $password_confirmation;
    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.app')->section('content');
    }

    public function rules(){
        return [
                    'name' =>'required',
                    'email' =>'required|email|unique:users',
                    'password' => 'confirmed|required|min:6',
                   
                ];
    }
    public function registerUser(){
        $this->validate();
        
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' =>  bcrypt($this->password),
        ]);
       
        Auth::login($user,true);
        event(new Registered($user));
        return redirect()->route('login');
    }
    
}
