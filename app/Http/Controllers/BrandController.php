<?php

namespace App\Http\Controllers;

use App\Entities\Brand;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    
    public function index()
    {
        $brands = DB::table('brands')->paginate(2);
        
        return view('admin.brand.add', ['brands' => $brands]);
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
