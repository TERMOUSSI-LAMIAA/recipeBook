<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }
    public function authenticate(Request $request)
    {
        $email = $request->email;
        $pass = $request->password;
        $credentials = ['email' => $email, 'password' => $pass];

        // if (Auth::attempt($credentials))
        $user = User::where('email', $email)->first();
        if ($user && $pass == $user->password) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->route('home');
        } else {
            return redirect()->route('login_form')->with('error', 'Invalid credentials')->withInput($request->only('email'));

        }
    }
}
