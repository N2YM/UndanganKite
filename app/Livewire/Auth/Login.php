<?php
namespace App\Livewire\Auth;


use Livewire\Component;
use App\Models\Admin\ModelAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class Login extends Component
{
    public $email, $password, $remember;

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.app')->section('content');
    }

    public function rules()
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];
    }

    public function loginUser()
    {
        $this->validate();

        $throttleKey = strtolower($this->email) . '|' . request()->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $this->addError('email', __('auth.throttle', [
                'seconds' => RateLimiter::availableIn($throttleKey)
            ]));
            return null;
        }

        $credentials = ['email' => $this->email, 'password' => $this->password];

        if (ModelAdmin::where('email', $this->email)->exists()) {
            if (!Auth::guard('admin')->attempt($credentials, $this->remember)) {
                RateLimiter::hit($throttleKey);
                $this->addError('email', __('auth.failed'));
                return null;
            }

            return redirect()->route('home');
        } else {
            if (!Auth::attempt($credentials, $this->remember)) {
                RateLimiter::hit($throttleKey);
                $this->addError('email', __('auth.failed'));
                return null;
            }

            return redirect()->route('dashboard');
        }
    }
}
