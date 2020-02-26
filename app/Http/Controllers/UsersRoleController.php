<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsersRoleRequest;
use App\Http\Requests\UpdateUsersRoleRequest;
use App\Repositories\UsersRoleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class UsersRoleController extends AppBaseController
{
    /** @var  UsersRoleRepository */
    private $usersRoleRepository;

    public function __construct(UsersRoleRepository $usersRoleRepo)
    {
        $this->usersRoleRepository = $usersRoleRepo;
    }

    /**
     * Display a listing of the UsersRole.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $usersRoles = $this->usersRoleRepository->all();

        return view('users_roles.index')
            ->with('usersRoles', $usersRoles);
    }

    /**
     * Show the form for creating a new UsersRole.
     *
     * @return Response
     */
    public function create()
    {
        return view('users_roles.create');
    }

    /**
     * Store a newly created UsersRole in storage.
     *
     * @param CreateUsersRoleRequest $request
     *
     * @return Response
     */
    public function store(CreateUsersRoleRequest $request)
    {
        $input = $request->all();

        $usersRole = $this->usersRoleRepository->create($input);

        Flash::success('Users Role saved successfully.');

        return redirect(route('usersRoles.index'));
    }

    /**
     * Display the specified UsersRole.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $usersRole = $this->usersRoleRepository->find($id);

        if (empty($usersRole)) {
            Flash::error('Users Role not found');

            return redirect(route('usersRoles.index'));
        }

        return view('users_roles.show')->with('usersRole', $usersRole);
    }

    /**
     * Show the form for editing the specified UsersRole.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $usersRole = $this->usersRoleRepository->find($id);

        if (empty($usersRole)) {
            Flash::error('Users Role not found');

            return redirect(route('usersRoles.index'));
        }

        return view('users_roles.edit')->with('usersRole', $usersRole);
    }

    /**
     * Update the specified UsersRole in storage.
     *
     * @param int $id
     * @param UpdateUsersRoleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsersRoleRequest $request)
    {
        $usersRole = $this->usersRoleRepository->find($id);

        if (empty($usersRole)) {
            Flash::error('Users Role not found');

            return redirect(route('usersRoles.index'));
        }

        $usersRole = $this->usersRoleRepository->update($request->all(), $id);

        Flash::success('Users Role updated successfully.');

        return redirect(route('usersRoles.index'));
    }

    /**
     * Remove the specified UsersRole from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $usersRole = $this->usersRoleRepository->find($id);

        if (empty($usersRole)) {
            Flash::error('Users Role not found');

            return redirect(route('usersRoles.index'));
        }

        $this->usersRoleRepository->delete($id);

        Flash::success('Users Role deleted successfully.');

        return redirect(route('usersRoles.index'));
    }
}
