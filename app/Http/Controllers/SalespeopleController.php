<?php

namespace App\Http\Controllers;

use App\Entities\Salespeople;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class SalespeopleController extends Controller
{
    public function index()
    {
        $salesman = DB::table('salespeoples')->paginate(2);

        return view('admin.salespeople.add', ['salesman' => $salesman]);
    }

    public function insert(Request $request)
    {
        try {
            $salespeople = new Salespeople();
            $salespeople->name = $request->input('salesman');
            $salespeople->celphone = $request->input('celphone');
            $salespeople->email = $request->input('email');

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
}
