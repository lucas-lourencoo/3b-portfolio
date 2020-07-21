<?php

namespace App\Http\Controllers;

use App\Entities\Regional;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\RegionalCreateRequest;
use App\Http\Requests\RegionalUpdateRequest;
use App\Repositories\RegionalRepository;
use App\Validators\RegionalValidator;
use Exception;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class RegionalsController.
 *
 * @package namespace App\Http\Controllers;
 */
class RegionalsController extends Controller
{
    public function index()
    {
        return view('admin.regional.add', ['update' => false]);
    }

    public function editar($id)
    {
        $regional = DB::table('regionals')
            ->where('id', $id)
            ->get()
            ->first();

        return view('admin.regional.add', [
            'regional' => $regional,
            'update' => true
        ]);
    }

    public function list()
    {
        $regionals = DB::table('regionals')->get();
        $datatable = DataTables::of($regionals);

        return $datatable->blacklist(['action'])->make(true);
    }

    private function saveCity($regional_id, Request $request)
    {
        foreach ($request->cities as $city) {
            DB::table('cities')->insert([
                'name' => $city,
                'regional' => $regional_id
            ]);
        }
    }

    public function insert(Request $request)
    {
        try {
            $regional_id = rand(10, 99);
            $regional = new Regional();
            $regional->id = $regional_id;
            $regional->name = $request->input('name');
            $regional->save();
            $this->saveCity($regional_id, $request);

            return redirect()->route('admin.regional.gerenciar', ['result' => 0]);
        } catch (Exception $e) {
            return redirect()->route('admin.regional.gerenciar', ['result' => 1]);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $regional = Regional::find($id);
            $regional->name = $request->input('name');
            $regional->save();
            $this->saveCity($id, $request);

            return redirect()->route('admin.regional.gerenciar', ['result' => 0]);
        } catch (Exception $e) {
            return redirect()->route('admin.regional.gerenciar', ['result' => 1]);
        }
    }

    public function excluir($id)
    {
        try {
            $regionals = DB::table('salespeoples')
                ->where('regional', $id)
                ->get()
                ->first();

            $regionals_city = DB::table('cities')
                ->where('regional', $id)
                ->get()
                ->first();

            if (!$regionals && !$regionals_city) {
                DB::table('regionals')->delete($id);
                return redirect()->route('admin.regional.gerenciar', ['result' => 2]);
            } else {
                return redirect()->route('admin.regional.gerenciar', ['result' => 3]);
            }
        } catch (Exception $e) {
            return redirect()->route('admin.regional.gerenciar', ['result' => 1]);
        }
    }
}
