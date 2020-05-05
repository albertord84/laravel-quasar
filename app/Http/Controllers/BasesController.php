<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBasesRequest;
use App\Http\Requests\UpdateBasesRequest;
use App\Repositories\BasesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BasesController extends AppBaseController
{
    /** @var  BasesRepository */
    private $basesRepository;

    public function __construct(BasesRepository $basesRepo)
    {
        $this->basesRepository = $basesRepo;
    }

    /**
     * Display a listing of the Bases.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $bases = $this->basesRepository->all();
        return $bases->toJson();

        // return view('bases.index')
        //     ->with('bases', $bases);
    }

    /**
     * Show the form for creating a new Bases.
     *
     * @return Response
     */
    public function create()
    {
        return view('bases.create');
    }

    /**
     * Store a newly created Bases in storage.
     *
     * @param CreateBasesRequest $request
     *
     * @return Response
     */
    public function store(CreateBasesRequest $request)
    {
        $input = $request->all();

        $bases = $this->basesRepository->create($input);

        Flash::success('Bases saved successfully.');

        return redirect(route('bases.index'));
    }

    /**
     * Display the specified Bases.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bases = $this->basesRepository->find($id);

        if (empty($bases)) {
            Flash::error('Bases not found');

            return redirect(route('bases.index'));
        }

        return view('bases.show')->with('bases', $bases);
    }

    /**
     * Show the form for editing the specified Bases.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bases = $this->basesRepository->find($id);

        if (empty($bases)) {
            Flash::error('Bases not found');

            return redirect(route('bases.index'));
        }

        return view('bases.edit')->with('bases', $bases);
    }

    /**
     * Update the specified Bases in storage.
     *
     * @param int $id
     * @param UpdateBasesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBasesRequest $request)
    {
        $bases = $this->basesRepository->find($id);

        if (empty($bases)) {
            Flash::error('Bases not found');

            return redirect(route('bases.index'));
        }

        $bases = $this->basesRepository->update($request->all(), $id);

        Flash::success('Bases updated successfully.');

        return redirect(route('bases.index'));
    }

    /**
     * Remove the specified Bases from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bases = $this->basesRepository->find($id);

        if (empty($bases)) {
            Flash::error('Bases not found');

            return redirect(route('bases.index'));
        }

        $this->basesRepository->delete($id);

        Flash::success('Bases deleted successfully.');

        return redirect(route('bases.index'));
    }
}
