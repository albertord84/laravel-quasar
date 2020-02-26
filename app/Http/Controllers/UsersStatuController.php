<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsersStatuRequest;
use App\Http\Requests\UpdateUsersStatuRequest;
use App\Repositories\UsersStatuRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class UsersStatuController extends AppBaseController
{
    /** @var  UsersStatuRepository */
    private $usersStatuRepository;

    public function __construct(UsersStatuRepository $usersStatuRepo)
    {
        $this->usersStatuRepository = $usersStatuRepo;
    }

    /**
     * Display a listing of the UsersStatu.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $usersStatus = $this->usersStatuRepository->all();

        return view('users_status.index')
            ->with('usersStatus', $usersStatus);
    }

    /**
     * Show the form for creating a new UsersStatu.
     *
     * @return Response
     */
    public function create()
    {
        return view('users_status.create');
    }

    /**
     * Store a newly created UsersStatu in storage.
     *
     * @param CreateUsersStatuRequest $request
     *
     * @return Response
     */
    public function store(CreateUsersStatuRequest $request)
    {
        $input = $request->all();

        $usersStatu = $this->usersStatuRepository->create($input);

        Flash::success('Users Statu saved successfully.');

        return redirect(route('usersStatus.index'));
    }

    /**
     * Display the specified UsersStatu.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $usersStatu = $this->usersStatuRepository->find($id);

        if (empty($usersStatu)) {
            Flash::error('Users Statu not found');

            return redirect(route('usersStatus.index'));
        }

        return view('users_status.show')->with('usersStatu', $usersStatu);
    }

    /**
     * Show the form for editing the specified UsersStatu.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $usersStatu = $this->usersStatuRepository->find($id);

        if (empty($usersStatu)) {
            Flash::error('Users Statu not found');

            return redirect(route('usersStatus.index'));
        }

        return view('users_status.edit')->with('usersStatu', $usersStatu);
    }

    /**
     * Update the specified UsersStatu in storage.
     *
     * @param int $id
     * @param UpdateUsersStatuRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsersStatuRequest $request)
    {
        $usersStatu = $this->usersStatuRepository->find($id);

        if (empty($usersStatu)) {
            Flash::error('Users Statu not found');

            return redirect(route('usersStatus.index'));
        }

        $usersStatu = $this->usersStatuRepository->update($request->all(), $id);

        Flash::success('Users Statu updated successfully.');

        return redirect(route('usersStatus.index'));
    }

    /**
     * Remove the specified UsersStatu from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $usersStatu = $this->usersStatuRepository->find($id);

        if (empty($usersStatu)) {
            Flash::error('Users Statu not found');

            return redirect(route('usersStatus.index'));
        }

        $this->usersStatuRepository->delete($id);

        Flash::success('Users Statu deleted successfully.');

        return redirect(route('usersStatus.index'));
    }
}
