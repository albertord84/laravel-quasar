<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsersRolesRequest;
use App\Http\Requests\UpdateUsersRolesRequest;
use App\Repositories\UsersRolesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class UsersRolesController extends AppBaseController
{
    /** @var  UsersRolesRepository */
    private $usersRolesRepository;

    public function __construct(UsersRolesRepository $usersRolesRepo)
    {
        $this->usersRolesRepository = $usersRolesRepo;
    }

    /**
     * Display a listing of the UsersRoles.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $usersRoles = $this->usersRolesRepository->all();
        return $usersRoles->toJson();

        // return view('users_roles.index')
        //     ->with('usersRoles', $usersRoles);
    }

    /**
     * Show the form for creating a new UsersRoles.
     *
     * @return Response
     */
    public function create()
    {
        return view('users_roles.create');
    }

    /**
     * Store a newly created UsersRoles in storage.
     *
     * @param CreateUsersRolesRequest $request
     *
     * @return Response
     */
    public function store(CreateUsersRolesRequest $request)
    {
        $input = $request->all();

        $usersRoles = $this->usersRolesRepository->create($input);

        Flash::success('Users Roles saved successfully.');

        return redirect(route('usersRoles.index'));
    }

    /**
     * Display the specified UsersRoles.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $usersRoles = $this->usersRolesRepository->find($id);

        if (empty($usersRoles)) {
            Flash::error('Users Roles not found');

            return redirect(route('usersRoles.index'));
        }

        return view('users_roles.show')->with('usersRoles', $usersRoles);
    }

    /**
     * Show the form for editing the specified UsersRoles.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $usersRoles = $this->usersRolesRepository->find($id);

        if (empty($usersRoles)) {
            Flash::error('Users Roles not found');

            return redirect(route('usersRoles.index'));
        }

        return view('users_roles.edit')->with('usersRoles', $usersRoles);
    }

    /**
     * Update the specified UsersRoles in storage.
     *
     * @param int $id
     * @param UpdateUsersRolesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsersRolesRequest $request)
    {
        $usersRoles = $this->usersRolesRepository->find($id);

        if (empty($usersRoles)) {
            Flash::error('Users Roles not found');

            return redirect(route('usersRoles.index'));
        }

        $usersRoles = $this->usersRolesRepository->update($request->all(), $id);

        Flash::success('Users Roles updated successfully.');

        return redirect(route('usersRoles.index'));
    }

    /**
     * Remove the specified UsersRoles from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $usersRoles = $this->usersRolesRepository->find($id);

        if (empty($usersRoles)) {
            Flash::error('Users Roles not found');

            return redirect(route('usersRoles.index'));
        }

        $this->usersRolesRepository->delete($id);

        Flash::success('Users Roles deleted successfully.');

        return redirect(route('usersRoles.index'));
    }
}
