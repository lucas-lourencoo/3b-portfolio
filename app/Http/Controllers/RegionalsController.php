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
use Illuminate\Support\Facades\DB;

/**
 * Class RegionalsController.
 *
 * @package namespace App\Http\Controllers;
 */
class RegionalsController extends Controller
{
    public function index()
    {
        $regionals = DB::table('regionals')->paginate(5);

        return view('admin.regional.add', ['regionals' => $regionals]);
    }

    public function insert(Request $request)
    {
        $regional = new Regional();
        $regional->name = $request->input('name');
        $regional->city = 'Campo Grande';
        $regional->save();

        return redirect()->route('admin.regional.gerenciar');
    }
}
