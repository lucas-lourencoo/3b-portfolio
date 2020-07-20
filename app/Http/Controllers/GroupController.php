<?php

namespace App\Http\Controllers;

use App\Entities\Group;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function index()
    {
        $salespeople = DB::table('salespeoples')->get();
        $groups = DB::table('groups')->paginate(2);

        return view('admin.group.add', ['salespeople' => $salespeople, 'groups' => $groups]);
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
}
