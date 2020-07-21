<?php

namespace App\Http\Controllers;

use App\Entities\Brand;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class BrandController extends Controller
{

    public function index()
    {
        return view('admin.brand.add', ['update' => false]);
    }

    public function list()
    {
        $brands = DB::table('brands')->get();
        $datatable = DataTables::of($brands);

        return $datatable->blacklist(['action'])->make(true);
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

    public function update($id, Request $request)
    {
        try {
            $brand = Brand::find($id);
            $brand->name = $request->input('brand');
            $brand->save();

            return redirect()->route('admin.marca.gerenciar', ['result' => 0]);
        } catch (Exception $e) {
            return redirect()->route('admin.marca.gerenciar', ['result' => 1]);
        }
    }

    public function editar($id)
    {
        $brand = DB::table('brands')
            ->where('id', $id)
            ->get()
            ->first();

        return view('admin.brand.add', [
            'brand' => $brand,
            'update' => true
        ]);
    }

    public function excluir($id)
    {
        try {
            $brands = DB::table('products')
                ->where('brand', $id)
                ->get()
                ->first();
            if (!$brands) {
                DB::table('brands')->delete($id);
                return redirect()->route('admin.marca.gerenciar', ['result' => 2]);
            } else {
                return redirect()->route('admin.marca.gerenciar', ['result' => 3]);
            }
        } catch (Exception $e) {
            return redirect()->route('admin.marca.gerenciar', ['result' => 1]);
        }
    }
}
