<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $groups = DB::table('groups')->get();
        $categories = DB::table('categories')->get();

        return view('index', ['groups' => $groups, 'categories' => $categories]);
    }

    public function contact()
    {
        $groups = DB::table('groups')->get();
        $categories = DB::table('categories')->get();

        return view('contact', ['groups' => $groups, 'categories' => $categories]);
    }

    public function products()
    {
        $groups = DB::table('groups')->get();
        $categories = DB::table('categories')->get();

        return view('products', ['groups' => $groups, 'categories' => $categories]);
    }

    public function single()
    {
        return view('single');
    }
}
