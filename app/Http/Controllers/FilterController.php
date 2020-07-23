<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    public function filter(Request $request)
    {
        $query = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category')
            ->join('brands', 'brands.id', '=', 'products.brand');

        if ($request->category)
            $query->where('categories.name', $request->category);

        if ($request->brand)
            $query->whereIn('brands.name', $request->brand);

        if ($request->animal)
            $query->whereIn('products.animal', $request->animal);

        if($request->max_price)
            $query->whereBetween('products.price', [$request->min_price, $request->max_price]);

        $produtos = $query->get('products.*');

        //dd($produtos);

        return $produtos;
    }
}
