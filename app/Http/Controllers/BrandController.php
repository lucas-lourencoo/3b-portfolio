<?php

namespace App\Http\Controllers;

use App\Entities\Brand;
use Exception;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    
    public function index()
    {
        return view('admin.brand.add');
    }

    public function insert(Request $request)
    {
        try {
            $brand = new Brand();
            $brand->name = $request->input('brand');
            $brand->save();

            return redirect()->route('admin.marca.gerenciar', ['result' => 0]);
        } catch (Exception $e) {
            return redirect()->route('admin.marca.gerenciar', ['result' => 1]);
        }
    }
}
