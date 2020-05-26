<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOptionsResponsesRequest;
use App\Http\Requests\UpdateOptionsResponsesRequest;
use App\Repositories\OptionsResponsesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class OptionsResponsesController extends AppBaseController
{
    /** @var  OptionsResponsesRepository */
    private $optionsResponsesRepository;

    public function __construct(OptionsResponsesRepository $optionsResponsesRepo)
    {
        $this->optionsResponsesRepository = $optionsResponsesRepo;
    }

    /**
     * Display a listing of the OptionsResponses.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $input = $request->all();
        $optionsResponses = $this->optionsResponsesRepository->filterOptionsResponses($input);
        return $optionsResponses->toJson();


        // return view('options_responses.index')
        //     ->with('optionsResponses', $optionsResponses);
    }

    /**
     * Show the form for creating a new OptionsResponses.
     *
     * @return Response
     */
    public function create()
    {
        return view('options_responses.create');
    }

    /**
     * Store a newly created OptionsResponses in storage.
     *
     * @param CreateOptionsResponsesRequest $request
     *
     * @return Response
     */
    public function store(CreateOptionsResponsesRequest $request)
    {
        $input = $request->all();

        $optionsResponses = $this->optionsResponsesRepository->create($input);

        return $optionsResponses->toJson();

        // Flash::success('Options Responses saved successfully.');

        // return redirect(route('optionsResponses.index'));
    }

    /**
     * Display the specified OptionsResponses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $optionsResponses = $this->optionsResponsesRepository->find($id);

        if (empty($optionsResponses)) {
            Flash::error('Options Responses not found');

            return redirect(route('optionsResponses.index'));
        }

        return view('options_responses.show')->with('optionsResponses', $optionsResponses);
    }

    /**
     * Show the form for editing the specified OptionsResponses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $optionsResponses = $this->optionsResponsesRepository->find($id);

        if (empty($optionsResponses)) {
            Flash::error('Options Responses not found');

            return redirect(route('optionsResponses.index'));
        }

        return view('options_responses.edit')->with('optionsResponses', $optionsResponses);
    }

    /**
     * Update the specified OptionsResponses in storage.
     *
     * @param int $id
     * @param UpdateOptionsResponsesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOptionsResponsesRequest $request)
    {
        $optionsResponses = $this->optionsResponsesRepository->find($id);

        if (empty($optionsResponses)) {
            Flash::error('Options Responses not found');

            return redirect(route('optionsResponses.index'));
        }

        $optionsResponses = $this->optionsResponsesRepository->update($request->all(), $id);

        return $optionsResponses->toJson();

        // Flash::success('Options Responses updated successfully.');

        // return redirect(route('optionsResponses.index'));
    }

    /**
     * Remove the specified OptionsResponses from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $optionsResponses = $this->optionsResponsesRepository->find($id);

        if (empty($optionsResponses)) {
            Flash::error('Options Responses not found');

            return redirect(route('optionsResponses.index'));
        }

        $this->optionsResponsesRepository->delete($id);

        // Flash::success('Options Responses deleted successfully.');

        // return redirect(route('optionsResponses.index'));
    }
}
