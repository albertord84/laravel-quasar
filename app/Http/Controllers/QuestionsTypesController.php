<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuestionsTypesRequest;
use App\Http\Requests\UpdateQuestionsTypesRequest;
use App\Repositories\QuestionsTypesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class QuestionsTypesController extends AppBaseController
{
    /** @var  QuestionsTypesRepository */
    private $questionsTypesRepository;

    public function __construct(QuestionsTypesRepository $questionsTypesRepo)
    {
        $this->questionsTypesRepository = $questionsTypesRepo;
    }

    /**
     * Display a listing of the QuestionsTypes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $questionsTypes = $this->questionsTypesRepository->all();

        return view('questions_types.index')
            ->with('questionsTypes', $questionsTypes);
    }

    /**
     * Show the form for creating a new QuestionsTypes.
     *
     * @return Response
     */
    public function create()
    {
        return view('questions_types.create');
    }

    /**
     * Store a newly created QuestionsTypes in storage.
     *
     * @param CreateQuestionsTypesRequest $request
     *
     * @return Response
     */
    public function store(CreateQuestionsTypesRequest $request)
    {
        $input = $request->all();

        $questionsTypes = $this->questionsTypesRepository->create($input);

        Flash::success('Questions Types saved successfully.');

        return redirect(route('questionsTypes.index'));
    }

    /**
     * Display the specified QuestionsTypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $questionsTypes = $this->questionsTypesRepository->find($id);

        if (empty($questionsTypes)) {
            Flash::error('Questions Types not found');

            return redirect(route('questionsTypes.index'));
        }

        return view('questions_types.show')->with('questionsTypes', $questionsTypes);
    }

    /**
     * Show the form for editing the specified QuestionsTypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $questionsTypes = $this->questionsTypesRepository->find($id);

        if (empty($questionsTypes)) {
            Flash::error('Questions Types not found');

            return redirect(route('questionsTypes.index'));
        }

        return view('questions_types.edit')->with('questionsTypes', $questionsTypes);
    }

    /**
     * Update the specified QuestionsTypes in storage.
     *
     * @param int $id
     * @param UpdateQuestionsTypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuestionsTypesRequest $request)
    {
        $questionsTypes = $this->questionsTypesRepository->find($id);

        if (empty($questionsTypes)) {
            Flash::error('Questions Types not found');

            return redirect(route('questionsTypes.index'));
        }

        $questionsTypes = $this->questionsTypesRepository->update($request->all(), $id);

        Flash::success('Questions Types updated successfully.');

        return redirect(route('questionsTypes.index'));
    }

    /**
     * Remove the specified QuestionsTypes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $questionsTypes = $this->questionsTypesRepository->find($id);

        if (empty($questionsTypes)) {
            Flash::error('Questions Types not found');

            return redirect(route('questionsTypes.index'));
        }

        $this->questionsTypesRepository->delete($id);

        Flash::success('Questions Types deleted successfully.');

        return redirect(route('questionsTypes.index'));
    }
}
