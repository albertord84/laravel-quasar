<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExtractionsStatusRequest;
use App\Http\Requests\UpdateExtractionsStatusRequest;
use App\Repositories\ExtractionsStatusRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ExtractionsStatusController extends AppBaseController
{
    /** @var  ExtractionsStatusRepository */
    private $extractionsStatusRepository;

    public function __construct(ExtractionsStatusRepository $extractionsStatusRepo)
    {
        $this->extractionsStatusRepository = $extractionsStatusRepo;
    }

    /**
     * Display a listing of the ExtractionsStatus.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $extractionsStatuses = $this->extractionsStatusRepository->all();

        return view('extractions_statuses.index')
            ->with('extractionsStatuses', $extractionsStatuses);
    }

    /**
     * Show the form for creating a new ExtractionsStatus.
     *
     * @return Response
     */
    public function create()
    {
        return view('extractions_statuses.create');
    }

    /**
     * Store a newly created ExtractionsStatus in storage.
     *
     * @param CreateExtractionsStatusRequest $request
     *
     * @return Response
     */
    public function store(CreateExtractionsStatusRequest $request)
    {
        $input = $request->all();

        $extractionsStatus = $this->extractionsStatusRepository->create($input);

        Flash::success('Extractions Status saved successfully.');

        return redirect(route('extractionsStatuses.index'));
    }

    /**
     * Display the specified ExtractionsStatus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $extractionsStatus = $this->extractionsStatusRepository->find($id);

        if (empty($extractionsStatus)) {
            Flash::error('Extractions Status not found');

            return redirect(route('extractionsStatuses.index'));
        }

        return view('extractions_statuses.show')->with('extractionsStatus', $extractionsStatus);
    }

    /**
     * Show the form for editing the specified ExtractionsStatus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $extractionsStatus = $this->extractionsStatusRepository->find($id);

        if (empty($extractionsStatus)) {
            Flash::error('Extractions Status not found');

            return redirect(route('extractionsStatuses.index'));
        }

        return view('extractions_statuses.edit')->with('extractionsStatus', $extractionsStatus);
    }

    /**
     * Update the specified ExtractionsStatus in storage.
     *
     * @param int $id
     * @param UpdateExtractionsStatusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExtractionsStatusRequest $request)
    {
        $extractionsStatus = $this->extractionsStatusRepository->find($id);

        if (empty($extractionsStatus)) {
            Flash::error('Extractions Status not found');

            return redirect(route('extractionsStatuses.index'));
        }

        $extractionsStatus = $this->extractionsStatusRepository->update($request->all(), $id);

        Flash::success('Extractions Status updated successfully.');

        return redirect(route('extractionsStatuses.index'));
    }

    /**
     * Remove the specified ExtractionsStatus from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $extractionsStatus = $this->extractionsStatusRepository->find($id);

        if (empty($extractionsStatus)) {
            Flash::error('Extractions Status not found');

            return redirect(route('extractionsStatuses.index'));
        }

        $this->extractionsStatusRepository->delete($id);

        Flash::success('Extractions Status deleted successfully.');

        return redirect(route('extractionsStatuses.index'));
    }
}
