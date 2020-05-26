<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRecompensesRequest;
use App\Http\Requests\UpdateRecompensesRequest;
use App\Repositories\RecompensesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class RecompensesController extends AppBaseController
{
    /** @var  RecompensesRepository */
    private $recompensesRepository;

    public function __construct(RecompensesRepository $recompensesRepo)
    {
        $this->recompensesRepository = $recompensesRepo;
    }

    /**
     * Display a listing of the Recompenses.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $input = $request->all();
        $recompenses = $this->recompensesRepository->filterRecompenses($input);
        return $recompenses->toJson();

        // return view('recompenses.index')
        //     ->with('recompenses', $recompenses);
    }

    /**
     * Show the form for creating a new Recompenses.
     *
     * @return Response
     */
    public function create()
    {
        return view('recompenses.create');
    }

    /**
     * Store a newly created Recompenses in storage.
     *
     * @param CreateRecompensesRequest $request
     *
     * @return Response
     */
    public function store(CreateRecompensesRequest $request)
    {
        $input = $request->all();

        $recompenses = $this->recompensesRepository->create($input);

        Flash::success('Recompenses saved successfully.');

        return redirect(route('recompenses.index'));
    }

    /**
     * Display the specified Recompenses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $recompenses = $this->recompensesRepository->find($id);

        if (empty($recompenses)) {
            Flash::error('Recompenses not found');

            return redirect(route('recompenses.index'));
        }

        return view('recompenses.show')->with('recompenses', $recompenses);
    }

    /**
     * Show the form for editing the specified Recompenses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $recompenses = $this->recompensesRepository->find($id);

        if (empty($recompenses)) {
            Flash::error('Recompenses not found');

            return redirect(route('recompenses.index'));
        }

        return view('recompenses.edit')->with('recompenses', $recompenses);
    }

    /**
     * Update the specified Recompenses in storage.
     *
     * @param int $id
     * @param UpdateRecompensesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRecompensesRequest $request)
    {
        $recompenses = $this->recompensesRepository->find($id);

        if (empty($recompenses)) {
            Flash::error('Recompenses not found');

            return redirect(route('recompenses.index'));
        }

        $recompenses = $this->recompensesRepository->update($request->all(), $id);

        return $recompenses->toJson();

        // Flash::success('Recompenses updated successfully.');

        // return redirect(route('recompenses.index'));
    }

    /**
     * Remove the specified Recompenses from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $recompenses = $this->recompensesRepository->find($id);

        if (empty($recompenses)) {
            Flash::error('Recompenses not found');

            return redirect(route('recompenses.index'));
        }

        $this->recompensesRepository->delete($id);

        Flash::success('Recompenses deleted successfully.');

        return redirect(route('recompenses.index'));
    }
}
