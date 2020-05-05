<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBasesOriginsRequest;
use App\Http\Requests\UpdateBasesOriginsRequest;
use App\Repositories\BasesOriginsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BasesOriginsController extends AppBaseController
{
    /** @var  BasesOriginsRepository */
    private $basesOriginsRepository;

    public function __construct(BasesOriginsRepository $basesOriginsRepo)
    {
        $this->basesOriginsRepository = $basesOriginsRepo;
    }

    /**
     * Display a listing of the BasesOrigins.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $basesOrigins = $this->basesOriginsRepository->all();
        return $basesOrigins->toJson();

        // return view('bases_origins.index')
        //     ->with('basesOrigins', $basesOrigins);
    }

    /**
     * Show the form for creating a new BasesOrigins.
     *
     * @return Response
     */
    public function create()
    {
        return view('bases_origins.create');
    }

    /**
     * Store a newly created BasesOrigins in storage.
     *
     * @param CreateBasesOriginsRequest $request
     *
     * @return Response
     */
    public function store(CreateBasesOriginsRequest $request)
    {
        $input = $request->all();

        $basesOrigins = $this->basesOriginsRepository->create($input);

        Flash::success('Bases Origins saved successfully.');

        return redirect(route('basesOrigins.index'));
    }

    /**
     * Display the specified BasesOrigins.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $basesOrigins = $this->basesOriginsRepository->find($id);

        if (empty($basesOrigins)) {
            Flash::error('Bases Origins not found');

            return redirect(route('basesOrigins.index'));
        }

        return view('bases_origins.show')->with('basesOrigins', $basesOrigins);
    }

    /**
     * Show the form for editing the specified BasesOrigins.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $basesOrigins = $this->basesOriginsRepository->find($id);

        if (empty($basesOrigins)) {
            Flash::error('Bases Origins not found');

            return redirect(route('basesOrigins.index'));
        }

        return view('bases_origins.edit')->with('basesOrigins', $basesOrigins);
    }

    /**
     * Update the specified BasesOrigins in storage.
     *
     * @param int $id
     * @param UpdateBasesOriginsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBasesOriginsRequest $request)
    {
        $basesOrigins = $this->basesOriginsRepository->find($id);

        if (empty($basesOrigins)) {
            Flash::error('Bases Origins not found');

            return redirect(route('basesOrigins.index'));
        }

        $basesOrigins = $this->basesOriginsRepository->update($request->all(), $id);

        Flash::success('Bases Origins updated successfully.');

        return redirect(route('basesOrigins.index'));
    }

    /**
     * Remove the specified BasesOrigins from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $basesOrigins = $this->basesOriginsRepository->find($id);

        if (empty($basesOrigins)) {
            Flash::error('Bases Origins not found');

            return redirect(route('basesOrigins.index'));
        }

        $this->basesOriginsRepository->delete($id);

        Flash::success('Bases Origins deleted successfully.');

        return redirect(route('basesOrigins.index'));
    }
}
