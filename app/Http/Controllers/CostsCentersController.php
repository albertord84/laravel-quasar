<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCostsCentersRequest;
use App\Http\Requests\UpdateCostsCentersRequest;
use App\Repositories\CostsCentersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class CostsCentersController extends AppBaseController
{
    /** @var  CostsCentersRepository */
    private $costsCentersRepository;

    public function __construct(CostsCentersRepository $costsCentersRepo)
    {
        $this->costsCentersRepository = $costsCentersRepo;
    }

    /**
     * Display a listing of the CostsCenters.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $input = $request->all();

        //TODO: userLoggued
        $userLogged = json_decode(Auth::guard('web')->user());
        $userLogged = json_decode($request['userLogged']);

        $costsCenters = $this->costsCentersRepository->filterCostsCenters($input, $userLogged);
        return $costsCenters->toJson();

        // return view('costs_centers.index')
        //     ->with('costsCenters', $costsCenters);
    }

    /**
     * Show the form for creating a new CostsCenters.
     *
     * @return Response
     */
    public function create()
    {
        return view('costs_centers.create');
    }

    /**
     * Store a newly created CostsCenters in storage.
     *
     * @param CreateCostsCentersRequest $request
     *
     * @return Response
     */
    public function store(CreateCostsCentersRequest $request)
    {
        $input = $request->all();

        $costsCenters = $this->costsCentersRepository->create($input);

        return $costsCenters->toJson();

        // Flash::success('Costs Centers saved successfully.');

        // return redirect(route('costsCenters.index'));
    }

    /**
     * Display the specified CostsCenters.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $costsCenters = $this->costsCentersRepository->find($id);

        if (empty($costsCenters)) {
            Flash::error('Costs Centers not found');

            return redirect(route('costsCenters.index'));
        }

        return view('costs_centers.show')->with('costsCenters', $costsCenters);
    }

    /**
     * Show the form for editing the specified CostsCenters.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $costsCenters = $this->costsCentersRepository->find($id);

        if (empty($costsCenters)) {
            Flash::error('Costs Centers not found');

            return redirect(route('costsCenters.index'));
        }

        return view('costs_centers.edit')->with('costsCenters', $costsCenters);
    }

    /**
     * Update the specified CostsCenters in storage.
     *
     * @param int $id
     * @param UpdateCostsCentersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCostsCentersRequest $request)
    {
        $costsCenters = $this->costsCentersRepository->find($id);

        if (empty($costsCenters)) {
            Flash::error('Costs Centers not found');

            return redirect(route('costsCenters.index'));
        }

        $costsCenters = $this->costsCentersRepository->update($request->all(), $id);

        return $costsCenters->toJson();

        // Flash::success('Costs Centers updated successfully.');

        // return redirect(route('costsCenters.index'));
    }

    /**
     * Remove the specified CostsCenters from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $costsCenters = $this->costsCentersRepository->find($id);

        if (empty($costsCenters)) {
            Flash::error('Costs Centers not found');

            return redirect(route('costsCenters.index'));
        }

        $this->costsCentersRepository->delete($id);

        // Flash::success('Costs Centers deleted successfully.');

        // return redirect(route('costsCenters.index'));
    }
}
