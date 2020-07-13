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
                return redirect()->route('admin.index');
            }else{
                return redirect()->route('login', ['r' => 1]);
            }
        } catch (\Exception $e) {
            return redirect()->route('login', ['r' => 2, 'error' => $e->getMessage()]);
        }
    }
    
    public function login()
    {
        return view('admin.login');
    }

    public function index()
    {
        return view('admin.index');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
