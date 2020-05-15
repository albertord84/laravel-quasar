<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExtractionsRequest;
use App\Http\Requests\UpdateExtractionsRequest;
use App\Repositories\ExtractionsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ExtractionsController extends AppBaseController
{
    /** @var  ExtractionsRepository */
    private $extractionsRepository;

    public function __construct(ExtractionsRepository $extractionsRepo)
    {
        $this->extractionsRepository = $extractionsRepo;
    }

    /**
     * Display a listing of the Extractions.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $input = $request->all();
        $extractions = $this->extractionsRepository->filterExtractions($input);
        return $extractions->toJson();


        // return view('extractions.index')
        //     ->with('extractions', $extractions);
    }

    /**
     * Show the form for creating a new Extractions.
     *
     * @return Response
     */
    public function create()
    {
        return view('extractions.create');
    }

    /**
     * Store a newly created Extractions in storage.
     *
     * @param CreateExtractionsRequest $request
     *
     * @return Response
     */
    public function store(CreateExtractionsRequest $request)
    {
        $input = $request->all();

        $extractions = $this->extractionsRepository->create($input);

        Flash::success('Extractions saved successfully.');

        return redirect(route('extractions.index'));
    }

    /**
     * Display the specified Extractions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $extractions = $this->extractionsRepository->find($id);

        if (empty($extractions)) {
            Flash::error('Extractions not found');

            return redirect(route('extractions.index'));
        }

        return view('extractions.show')->with('extractions', $extractions);
    }

    /**
     * Show the form for editing the specified Extractions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $extractions = $this->extractionsRepository->find($id);

        if (empty($extractions)) {
            Flash::error('Extractions not found');

            return redirect(route('extractions.index'));
        }

        return view('extractions.edit')->with('extractions', $extractions);
    }

    /**
     * Update the specified Extractions in storage.
     *
     * @param int $id
     * @param UpdateExtractionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExtractionsRequest $request)
    {
        $extractions = $this->extractionsRepository->find($id);

        if (empty($extractions)) {
            Flash::error('Extractions not found');

            return redirect(route('extractions.index'));
        }

        $extractions = $this->extractionsRepository->update($request->all(), $id);

        Flash::success('Extractions updated successfully.');

        return redirect(route('extractions.index'));
    }

    /**
     * Remove the specified Extractions from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $extractions = $this->extractionsRepository->find($id);

        if (empty($extractions)) {
            Flash::error('Extractions not found');

            return redirect(route('extractions.index'));
        }

        $this->extractionsRepository->delete($id);

        Flash::success('Extractions deleted successfully.');

        return redirect(route('extractions.index'));
    }
}
