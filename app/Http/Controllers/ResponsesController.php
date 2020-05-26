<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateResponsesRequest;
use App\Http\Requests\UpdateResponsesRequest;
use App\Repositories\ResponsesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ResponsesController extends AppBaseController
{
    /** @var  ResponsesRepository */
    private $responsesRepository;

    public function __construct(ResponsesRepository $responsesRepo)
    {
        $this->responsesRepository = $responsesRepo;
    }

    /**
     * Display a listing of the Responses.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $input = $request->all();
        $responses = $this->responsesRepository->filterResponses($input);
        return $responses->toJson();

        // return view('responses.index')
        //     ->with('responses', $responses);
    }

    /**
     * Show the form for creating a new Responses.
     *
     * @return Response
     */
    public function create()
    {
        return view('responses.create');
    }

    /**
     * Store a newly created Responses in storage.
     *
     * @param CreateResponsesRequest $request
     *
     * @return Response
     */
    public function store(CreateResponsesRequest $request)
    {
        $input = $request->all();

        $responses = $this->responsesRepository->create($input);

        return $responses->toJson();

        // Flash::success('Responses saved successfully.');

        // return redirect(route('responses.index'));
    }

    /**
     * Display the specified Responses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $responses = $this->responsesRepository->find($id);

        if (empty($responses)) {
            Flash::error('Responses not found');

            return redirect(route('responses.index'));
        }

        return view('responses.show')->with('responses', $responses);
    }

    /**
     * Show the form for editing the specified Responses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $responses = $this->responsesRepository->find($id);

        if (empty($responses)) {
            Flash::error('Responses not found');

            return redirect(route('responses.index'));
        }

        return view('responses.edit')->with('responses', $responses);
    }

    /**
     * Update the specified Responses in storage.
     *
     * @param int $id
     * @param UpdateResponsesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateResponsesRequest $request)
    {
        $responses = $this->responsesRepository->find($id);

        if (empty($responses)) {
            Flash::error('Responses not found');

            return redirect(route('responses.index'));
        }

        $responses = $this->responsesRepository->update($request->all(), $id);

        return $responses->toJson();

        // Flash::success('Responses updated successfully.');

        // return redirect(route('responses.index'));
    }

    /**
     * Remove the specified Responses from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $responses = $this->responsesRepository->find($id);

        if (empty($responses)) {
            Flash::error('Responses not found');

            return redirect(route('responses.index'));
        }

        $this->responsesRepository->delete($id);

        // Flash::success('Responses deleted successfully.');

        // return redirect(route('responses.index'));
    }
}
