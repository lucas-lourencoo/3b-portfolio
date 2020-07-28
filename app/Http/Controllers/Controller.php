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

    public function salespeople($city)
    {
        $sales = DB::table('cities')
            ->join('regionals', 'cities.regional', '=', 'regionals.id')
            ->join('salespeoples', 'regionals.id', '=', 'salespeoples.regional')
            ->where('cities.name', $city)
            ->limit(2)
            ->get('salespeoples.*');
        
        return $sales;
    }

    public function single($id)
    {
        $groups = DB::table('groups')->get();
        $categories = DB::table('categories')->get();

        //Buscando o produto e suas informações
        $product = DB::table('products')
            ->join('brands', 'brands.id', '=', 'products.brand')
            ->join('categories', 'categories.id', '=', 'products.category')
            ->where('products.id', $id)
            ->get([
                'products.*',
                'brands.name as brand',
                'categories.name as category'
            ])
            ->first();

        $salesman = DB::table('salespeoples')
            ->get()
            ->first();

        return view('single', [
            'groups' => $groups,
            'categories' => $categories,
            'product' => $product,
            'salesman' => $salesman
        ]);
    }
}
