<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsersBasesRequest;
use App\Http\Requests\UpdateUsersBasesRequest;
use App\Repositories\UsersBasesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class UsersBasesController extends AppBaseController
{
    /** @var  UsersBasesRepository */
    private $usersBasesRepository;

    public function __construct(UsersBasesRepository $usersBasesRepo)
    {
        $this->usersBasesRepository = $usersBasesRepo;
    }

    /**
     * Display a listing of the UsersBases.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $usersBases = $this->usersBasesRepository->all();
        return $usersBases->toJson();

        // return view('users_bases.index')
        //     ->with('usersBases', $usersBases);
    }

    /**
     * Show the form for creating a new UsersBases.
     *
     * @return Response
     */
    public function create()
    {
        return view('users_bases.create');
    }

    /**
     * Store a newly created UsersBases in storage.
     *
     * @param CreateUsersBasesRequest $request
     *
     * @return Response
     */
    public function store(CreateUsersBasesRequest $request)
    {
        $input = $request->all();

        $usersBases = $this->usersBasesRepository->create($input);

        Flash::success('Users Bases saved successfully.');

        return redirect(route('usersBases.index'));
    }

    /**
     * Display the specified UsersBases.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $usersBases = $this->usersBasesRepository->find($id);

        if (empty($usersBases)) {
            Flash::error('Users Bases not found');

            return redirect(route('usersBases.index'));
        }

        return view('users_bases.show')->with('usersBases', $usersBases);
    }

    /**
     * Show the form for editing the specified UsersBases.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $usersBases = $this->usersBasesRepository->find($id);

        if (empty($usersBases)) {
            Flash::error('Users Bases not found');

            return redirect(route('usersBases.index'));
        }

        return view('users_bases.edit')->with('usersBases', $usersBases);
    }

    /**
     * Update the specified UsersBases in storage.
     *
     * @param int $id
     * @param UpdateUsersBasesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsersBasesRequest $request)
    {
        $usersBases = $this->usersBasesRepository->find($id);

        if (empty($usersBases)) {
            Flash::error('Users Bases not found');

            return redirect(route('usersBases.index'));
        }

        $usersBases = $this->usersBasesRepository->update($request->all(), $id);

        Flash::success('Users Bases updated successfully.');

        return redirect(route('usersBases.index'));
    }

    /**
     * Remove the specified UsersBases from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $usersBases = $this->usersBasesRepository->find($id);

        if (empty($usersBases)) {
            Flash::error('Users Bases not found');

            return redirect(route('usersBases.index'));
        }

        $this->usersBasesRepository->delete($id);

        Flash::success('Users Bases deleted successfully.');

        return redirect(route('usersBases.index'));
    }
}
