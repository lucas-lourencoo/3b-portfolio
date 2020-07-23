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
            ->join('brands', 'brands.id', '=', 'products.brand')
            ->join('animals', 'animals.product', '=', 'products.id');

        if ($request->category)
            $query->where('categories.name', $request->category);

        if ($request->brand)
            $query->whereIn('brands.name', $request->brand);

        if ($request->animal)
            $query->whereIn('animals.name', $request->animal);

        if ($request->max_price)
            $query->whereBetween('products.price', [$request->min_price, $request->max_price]);

        if ($request->order) {
            if ($request->order === 'asc')
                $query->orderBy('products.price');
            else
                $query->orderByDesc('products.price');
        }

        $querytotal = $query;
        $queryprod = clone $querytotal;

        $newtotal = $querytotal->selectRaw('count(products.id) as total')->first();

        $start = (intval($request->pageNumber) - 1) * intval($request->pageSize);
        $products = $queryprod->distinct()->skip($start)->take($request->pageSize)->get('products.*');

        if (isset($products[0]))
            $products[0]->total = $newtotal->total;

        return $products;
    }
}
