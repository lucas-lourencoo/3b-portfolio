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
        $salespeople = DB::table('salespeople')->get();
        return view('admin.group.add', ['salespeople' => $salespeople]);
    }

    public function insert(Request $request)
    {
        try {
            $group = new Group();
            $group->name = $request->input('group');
            $group->sales = $request->get('salesman');
            $group->save();

            return redirect()->route('admin.grupo.gerenciar', ['result' => 0]);
        } catch (Exception $e) {
            return redirect()->route('admin.grupo.gerenciar', ['result' => 1]);
        }
    }
}
