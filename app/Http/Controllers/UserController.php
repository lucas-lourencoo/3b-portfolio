<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function auth(Request $request)
    {
        $data = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];

        try {
            if (Auth::attempt($data, false)) {
                return redirect()->route('index');
            } else {
                return redirect()->route('login', ['result' => 1]);
            }
        } catch (\Exception $e) {
            return redirect()->route('login', ['result' => 2]);
        }
    }
    
    public function login()
    {
        return view('admin.login');
    }
}
