<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthRedirectController extends Controller
{
    public function logoutAndRedirectToRegister(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('register');
    }
}