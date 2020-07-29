<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    public function filter(Request $request)
    {
        if($request->search){
            $products = $this->getSearch($request->search);
            return $products;
        }

        $query = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category')
            ->join('brands', 'brands.id', '=', 'products.brand');

        if ($request->animals)
            $query->join('animals', 'animals.product', '=', 'products.id')
                ->whereIn('animals.name', $request->animals);

        if ($request->categories)
            $query->whereIn('categories.name', $request->categories);

        if ($request->brands)
            $query->whereIn('brands.name', $request->brands);

        if ($request->max_price)
            $query->whereBetween('products.price', [$request->min_price, $request->max_price]);


        $querytotal = $query;
        $queryprod = clone $querytotal;

        if ($request->order) {
            if ($request->order === 'asc')
                $queryprod->orderByDesc('products.price');
            else
                $queryprod->orderBy('products.price');
        }

        $newtotal = $querytotal->selectRaw('count(products.id) as total')->first();

        $start = (intval($request->pageNumber) - 1) * intval($request->pageSize);
        $products = $queryprod
            ->skip($start)
            ->take($request->pageSize)
            ->distinct()
            ->get([
                'products.*'
            ]);

        foreach ($products as $product) {
            $animal = DB::table('animals')->where('product', $product->id)->get('name');
            $product->animal = $animal;
        }

        if (isset($products[0]))
            $products[0]->total = $newtotal->total;

        return $products;
    }

    private function getSearch($search)
    {
        $products = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category')
            ->join('brands', 'brands.id', '=', 'products.brand')
            ->join('animals', 'animals.product', '=', 'products.id')
            ->where('products.name', 'like', '%' . $search . '%')
            ->orWhere('brands.name', 'like', '%' . $search . '%')
            ->orWhere('categories.name', 'like', '%' . $search . '%')
            ->orWhere('animals.name', 'like', '%' . $search . '%')
            ->distinct()
            ->get('products.*');

        return $products;
    }
}
