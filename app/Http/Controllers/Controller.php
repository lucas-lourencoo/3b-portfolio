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
        $brands = DB::table('brands')->get();


        return view('products', ['groups' => $groups, 'categories' => $categories, 'brands' => $brands]);
    }

    public function single()
    {
        $groups = DB::table('groups')->get();
        $categories = DB::table('categories')->get();
        $product = DB::table('products')->where('id', 5283)->get()->first();
        $category = DB::table('categories')->where('id', $product->category)->get()->first();
        $brand = DB::table('brands')->where('id', $product->brand)->get()->first();
        $salesman = DB::table('salespeoples')
            ->get()
            ->first();

        return view('single', [
            'groups' => $groups,
            'categories' => $categories,
            'product' => $product,
            'category' => $category,
            'brand' => $brand,
            'salesman' => $salesman
        ]);
    }
}
