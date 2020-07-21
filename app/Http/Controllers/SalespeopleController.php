<?php

namespace App\Http\Controllers;

use App\Entities\Salespeople;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Yajra\DataTables\Facades\DataTables;

class SalespeopleController extends Controller
{
    public function index()
    {
        $regionals = DB::table('regionals')->get();

        return view('admin.salespeople.add', [
            'regionals' => $regionals,
            'update' => false
        ]);
    }

    public function list()
    {
        $salespeoples = DB::table('salespeoples')
            ->join('regionals', 'salespeoples.regional', '=', 'regionals.id')
            ->get([
                'regionals.name as regional',
                'salespeoples.id',
                'salespeoples.name',
                'salespeoples.celphone',
                'salespeoples.email',
            ]);
        $datatable = DataTables::of($salespeoples);

        return $datatable->blacklist(['action'])->make(true);
    }

    public function insert(Request $request)
    {
        try {
            $salespeople = new Salespeople();
            $salespeople->name = $request->input('salesman');
            $salespeople->celphone = $request->input('celphone');
            $salespeople->email = $request->input('email');
            $salespeople->regional = $request->input('regional');

            if ($request->hasFile('profile') && $request->file('profile')->isValid()) {
                $image = $request->file('profile');
                $rand = strval(mt_rand());
                $nameFile = $rand . "." . $image->getClientOriginalExtension();

                $resize_thumb = Image::make($image)->orientate()->fit(275, 330)->encode();
                Storage::put($nameFile, $resize_thumb);
                Storage::move($nameFile, 'public/profile/' . $nameFile);

                $salespeople->photo = $nameFile;
            }
            $salespeople->save();

            return redirect()->route('admin.vendedor.gerenciar', ['result' => 0]);
        } catch (Exception $e) {
            return redirect()->route('admin.vendedor.gerenciar', ['result' => 1]);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $salespeople = Salespeople::find($id);
            $salespeople->name = $request->input('salesman');
            $salespeople->celphone = $request->input('celphone');
            $salespeople->email = $request->input('email');
            $salespeople->regional = $request->input('regional');

            if ($request->hasFile('profile') && $request->file('profile')->isValid()) {
                $image = $request->file('profile');
                $rand = strval(mt_rand());
                $nameFile = $rand . "." . $image->getClientOriginalExtension();

                $resize_thumb = Image::make($image)->orientate()->fit(275, 330)->encode();
                Storage::put($nameFile, $resize_thumb);
                Storage::move($nameFile, 'public/profile/' . $nameFile);

                $salespeople->photo = $nameFile;
            }
            $salespeople->save();

            return redirect()->route('admin.vendedor.gerenciar', ['result' => 0]);
        } catch (Exception $e) {
            return redirect()->route('admin.vendedor.gerenciar', ['result' => 1]);
        }
    }

    public function editar($id)
    {
        $salesman = DB::table('salespeoples')
            ->where('id', $id)
            ->get()
            ->first();
        $regionals = DB::table('regionals')->get();

        return view('admin.salespeople.add', [
            'salesman' => $salesman,
            'regionals' => $regionals,
            'update' => true
        ]);
    }

    public function excluir($id)
    {
        try {
            $sale = Salespeople::find($id);
            Storage::delete('public/profile/' . $sale->photo);

            DB::table('salespeoples')->delete($id);
            return redirect()->route('admin.vendedor.gerenciar', ['result' => 2]);
        } catch (Exception $e) {
            return redirect()->route('admin.vendedor.gerenciar', ['result' => 1]);
        }
    }
}
