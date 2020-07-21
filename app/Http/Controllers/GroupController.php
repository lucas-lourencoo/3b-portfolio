<?php

namespace App\Http\Controllers;

use App\Entities\Group;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class GroupController extends Controller
{
    public function index()
    {
        return view('admin.group.add', ['update' => false]);
    }

    public function editar($id)
    {
        $group = DB::table('groups')
            ->where('id', $id)
            ->get()
            ->first();

        return view('admin.group.add', [
            'update' => true,
            'group' => $group
        ]);
    }

    public function list()
    {
        $groups = DB::table('groups')->get();
        $datatable = DataTables::of($groups);

        return $datatable->blacklist(['action'])->make(true);
    }

    public function insert(Request $request)
    {
        try {
            $group = new Group();
            $group->name = $request->input('group');
            $group->save();

            return redirect()->route('admin.grupo.gerenciar', ['result' => 0]);
        } catch (Exception $e) {
            return redirect()->route('admin.grupo.gerenciar', ['result' => 1]);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $group = Group::find($id);
            $group->name = $request->input('group');
            $group->save();

            return redirect()->route('admin.grupo.gerenciar', ['result' => 0]);
        } catch (Exception $e) {
            return redirect()->route('admin.grupo.gerenciar', ['result' => 1]);
        }
    }

    public function excluir($id)
    {
        try {
            $groups = DB::table('categories')
                ->where('group_id', $id)
                ->get()
                ->first();

            if (!$groups) {
                DB::table('groups')->delete($id);
                return redirect()->route('admin.grupo.gerenciar', ['result' => 2]);
            } else {
                return redirect()->route('admin.grupo.gerenciar', ['result' => 3]);
            }
        } catch (Exception $e) {
            return redirect()->route('admin.grupo.gerenciar', ['result' => 1]);
        }
    }
}
