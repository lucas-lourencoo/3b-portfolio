<?php

namespace App\Http\Controllers;

use App\Entities\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $groups = DB::table('groups')->get();
        return view('admin.category.add', ['groups' => $groups]);
    }

    public function insert(Request $request)
    {
        try {
            $category = new Category();
            $category->name = $request->get('name');
            $category->group_id = $request->get('group');
            $category->save();

            return redirect()->route('admin.categoria.gerenciar', ['result' => 0]);
        } catch (Exception $e) {
            return redirect()->route('admin.categoria.gerenciar', ['result' => 1]);
        }
    }
}
