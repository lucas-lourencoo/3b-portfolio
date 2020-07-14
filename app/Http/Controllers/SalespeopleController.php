<?php

namespace App\Http\Controllers;

use App\Entities\Salespeople;
use Exception;
use Illuminate\Http\Request;

class SalespeopleController extends Controller
{
    public function index()
    {
        return view('admin.salespeople.add');
    }

    public function insert(Request $request)
    {
        try {
            $salespeople = new Salespeople();
            $salespeople->name = $request->input('salesman');
            $salespeople->celphone = $request->input('celphone');
            $salespeople->email = $request->input('email');
            $salespeople->photo = $request->input('photo');
            $salespeople->save();

            return redirect()->route('admin.vendedor.gerenciar', ['result' => 0]);
        } catch (Exception $e) {
            return redirect()->route('admin.vendedor.gerenciar', ['result' => 1]);
        }
    }
}
