<?php

namespace App\Http\Controllers;

use App\Entities\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function index()
    {
        $groups = DB::table('groups')->get();

        return view('admin.category.add', ['groups' => $groups, 'update' => false]);
    }

    public function list()
    {
        $categories = DB::table('categories')
            ->join('groups', 'categories.group_id', '=', 'groups.id')
            ->get([
                'groups.name as group_id',
                'categories.id',
                'categories.name'
            ]);
        
        $datatable = Datatables::of($categories);
        return $datatable->blacklist(['action'])->make(true);
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

    public function editar($id)
    {
        $category = DB::table('categories')->where('id', $id)->get()->first();
        $groups = DB::table('groups')->get();

        return view('admin.category.add', [
            'groups' => $groups,
            'category' => $category,
            'update' => true
        ]);
    }

    public function update($id, Request $request)
    {
        try {

            $category = Category::find($id);
            $category->name = $request->input('name');
            $category->group_id = $request->get('group');
            $category->save();

            return redirect()->route('admin.categoria.gerenciar', ['result' => 0]);;
        } catch (Exception $e) {
            return redirect()->route('admin.categoria.gerenciar', ['result' => 1]);
        }
    }
}
