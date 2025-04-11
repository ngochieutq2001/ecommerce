<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticated(Request $request, $user)
    {
        switch ($user->role) {
            case 'admin':
                return redirect('/admin');
            case 'seller':
                return redirect('/seller');
            case 'user':
            default:
                return redirect('/dashboard');
        }
    }
}

