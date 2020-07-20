<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\RegionalCreateRequest;
use App\Http\Requests\RegionalUpdateRequest;
use App\Repositories\RegionalRepository;
use App\Validators\RegionalValidator;

/**
 * Class RegionalsController.
 *
 * @package namespace App\Http\Controllers;
 */
class RegionalsController extends Controller
{
    /**
     * @var RegionalRepository
     */
    protected $repository;

    /**
     * @var RegionalValidator
     */
    protected $validator;

    /**
     * RegionalsController constructor.
     *
     * @param RegionalRepository $repository
     * @param RegionalValidator $validator
     */
    public function __construct(RegionalRepository $repository, RegionalValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $regionals = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $regionals,
            ]);
        }

        return view('regionals.index', compact('regionals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RegionalCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(RegionalCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $regional = $this->repository->create($request->all());

            $response = [
                'message' => 'Regional created.',
                'data'    => $regional->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $regional = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $regional,
            ]);
        }

        return view('regionals.show', compact('regional'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regional = $this->repository->find($id);

        return view('regionals.edit', compact('regional'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RegionalUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(RegionalUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $regional = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Regional updated.',
                'data'    => $regional->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Regional deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Regional deleted.');
    }
}
