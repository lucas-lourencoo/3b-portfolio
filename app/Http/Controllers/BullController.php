<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BullController extends Controller
{

    public function index()
    {
        return view('admin.bull.add');
    }
}
