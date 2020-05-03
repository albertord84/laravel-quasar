<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuestionnairesRequest;
use App\Http\Requests\UpdateQuestionnairesRequest;
use App\Repositories\QuestionnairesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class QuestionnairesController extends AppBaseController
{
    /** @var  QuestionnairesRepository */
    private $questionnairesRepository;

    public function __construct(QuestionnairesRepository $questionnairesRepo)
    {
        $this->questionnairesRepository = $questionnairesRepo;
    }

    /**
     * Display a listing of the Questionnaires.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // $User = Auth::check() ? Auth::user() : session('logged_user');

        $questionnaires = $this->questionnairesRepository->all();

        return $questionnaires->toJson();

        // $questionnaires = $this->questionnairesRepository->all();
        // return view('questionnaires.index')
        //     ->with('questionnaires', $questionnaires);
    }

    /**
     * Show the form for creating a new Questionnaires.
     *
     * @return Response
     */
    public function create()
    {
        return view('questionnaires.create');
    }

    /**
     * Store a newly created Questionnaires in storage.
     *
     * @param CreateQuestionnairesRequest $request
     *
     * @return Response
     */
    public function store(CreateQuestionnairesRequest $request)
    {
        $input = $request->all();

        $questionnaires = $this->questionnairesRepository->create($input);

        Flash::success('Questionnaires saved successfully.');

        return redirect(route('questionnaires.index'));
    }

    /**
     * Display the specified Questionnaires.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $questionnaires = $this->questionnairesRepository->find($id);

        if (empty($questionnaires)) {
            Flash::error('Questionnaires not found');

            return redirect(route('questionnaires.index'));
        }

        return view('questionnaires.show')->with('questionnaires', $questionnaires);
    }

    /**
     * Show the form for editing the specified Questionnaires.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $questionnaires = $this->questionnairesRepository->find($id);

        if (empty($questionnaires)) {
            Flash::error('Questionnaires not found');

            return redirect(route('questionnaires.index'));
        }

        return view('questionnaires.edit')->with('questionnaires', $questionnaires);
    }

    /**
     * Update the specified Questionnaires in storage.
     *
     * @param int $id
     * @param UpdateQuestionnairesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuestionnairesRequest $request)
    {
        $questionnaires = $this->questionnairesRepository->find($id);

        if (empty($questionnaires)) {
            Flash::error('Questionnaires not found');

            return redirect(route('questionnaires.index'));
        }

        $questionnaires = $this->questionnairesRepository->update($request->all(), $id);

        Flash::success('Questionnaires updated successfully.');

        return redirect(route('questionnaires.index'));
    }

    /**
     * Remove the specified Questionnaires from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $questionnaires = $this->questionnairesRepository->find($id);

        if (empty($questionnaires)) {
            Flash::error('Questionnaires not found');

            return redirect(route('questionnaires.index'));
        }

        $this->questionnairesRepository->delete($id);

        Flash::success('Questionnaires deleted successfully.');

        return redirect(route('questionnaires.index'));
    }
}
