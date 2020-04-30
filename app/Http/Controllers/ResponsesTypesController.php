<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateResponsesTypesRequest;
use App\Http\Requests\UpdateResponsesTypesRequest;
use App\Repositories\ResponsesTypesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ResponsesTypesController extends AppBaseController
{
    /** @var  ResponsesTypesRepository */
    private $responsesTypesRepository;

    public function __construct(ResponsesTypesRepository $responsesTypesRepo)
    {
        $this->responsesTypesRepository = $responsesTypesRepo;
    }

    /**
     * Display a listing of the ResponsesTypes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $responsesTypes = $this->responsesTypesRepository->all();

        return view('responses_types.index')
            ->with('responsesTypes', $responsesTypes);
    }

    /**
     * Show the form for creating a new ResponsesTypes.
     *
     * @return Response
     */
    public function create()
    {
        return view('responses_types.create');
    }

    /**
     * Store a newly created ResponsesTypes in storage.
     *
     * @param CreateResponsesTypesRequest $request
     *
     * @return Response
     */
    public function store(CreateResponsesTypesRequest $request)
    {
        $input = $request->all();

        $responsesTypes = $this->responsesTypesRepository->create($input);

        Flash::success('Responses Types saved successfully.');

        return redirect(route('responsesTypes.index'));
    }

    /**
     * Display the specified ResponsesTypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $responsesTypes = $this->responsesTypesRepository->find($id);

        if (empty($responsesTypes)) {
            Flash::error('Responses Types not found');

            return redirect(route('responsesTypes.index'));
        }

        return view('responses_types.show')->with('responsesTypes', $responsesTypes);
    }

    /**
     * Show the form for editing the specified ResponsesTypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $responsesTypes = $this->responsesTypesRepository->find($id);

        if (empty($responsesTypes)) {
            Flash::error('Responses Types not found');

            return redirect(route('responsesTypes.index'));
        }

        return view('responses_types.edit')->with('responsesTypes', $responsesTypes);
    }

    /**
     * Update the specified ResponsesTypes in storage.
     *
     * @param int $id
     * @param UpdateResponsesTypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateResponsesTypesRequest $request)
    {
        $responsesTypes = $this->responsesTypesRepository->find($id);

        if (empty($responsesTypes)) {
            Flash::error('Responses Types not found');

            return redirect(route('responsesTypes.index'));
        }

        $responsesTypes = $this->responsesTypesRepository->update($request->all(), $id);

        Flash::success('Responses Types updated successfully.');

        return redirect(route('responsesTypes.index'));
    }

    /**
     * Remove the specified ResponsesTypes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $responsesTypes = $this->responsesTypesRepository->find($id);

        if (empty($responsesTypes)) {
            Flash::error('Responses Types not found');

            return redirect(route('responsesTypes.index'));
        }

        $this->responsesTypesRepository->delete($id);

        Flash::success('Responses Types deleted successfully.');

        return redirect(route('responsesTypes.index'));
    }
}
