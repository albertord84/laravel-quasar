<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Repositories\UsersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Http\Controllers\UsersRolesController;
use Illuminate\Support\Facades\Auth;

class UsersController extends AppBaseController
{
    /** @var  UsersRepository */
    private $usersRepository;

    public function __construct(UsersRepository $usersRepo)
    {
        $this->usersRepository = $usersRepo;
    }

    /**
     * Display a listing of the Users.
     * @param Request $request
     * @return Response
     */
    public function index(Request $request){
        $input = $request->all();

        //TODO: userLoggued
        $userLogged = json_decode(Auth::guard('web')->user());
        $userLogged = json_decode($request['userLogged']);

        $users = $this->usersRepository->filterUsers($input, $userLogged);
        return $users->toJson();
    }

    /**
     * Show the form for creating a new Users.
     * @return Response
     */
    public function create() {
        return view('users.create');
    }

    /**
     * Store a newly created Users in storage.
     * @param CreateUsersRequest $request
     * @return Response
     */
    public function store(CreateUsersRequest $request){
        $input = $request->all();
        $user = $this->usersRepository->create($input);
        return $user->toJson();

        // Flash::success('Users saved successfully.');
        // return redirect(route('users.index'));
    }

    /**
     * Display the specified Users.
     * @param int $id
     * @return Response
     */
    public function show($id) {
        $users = $this->usersRepository->find($id);
        if (empty($users)) {
            Flash::error('Users not found');
            return redirect(route('users.index'));
        }
        return view('users.show')->with('users', $users);
    }

    /**
     * Show the form for editing the specified Users.
     * @param int $id
     * @return Response
     */
    public function edit($id) {
        $users = $this->usersRepository->find($id);
        if (empty($users)) {
            Flash::error('Users not found');
            return redirect(route('users.index'));
        }
        return view('users.edit')->with('users', $users);
    }

    /**
     * Update the specified Users in storage.
     * @param int $id
     * @param UpdateUsersRequest $request
     * @return Response
     */
    public function update($id, UpdateUsersRequest $request) {
        $users = $this->usersRepository->find($id);
        $users = $this->usersRepository->update($request->all(), $id);
        return $users->toJson();

        // if (empty($users)) {
        //     Flash::error('Users not found');
        //     return redirect(route('users.index'));
        // }
        // Flash::success('Users updated successfully.');
        // return redirect(route('users.index'));
    }

    /**
     * Remove the specified Users from storage.
     * @param int $id
     * @throws \Exception
     * @return Response
     */
    public function destroy($id) {
        $users = $this->usersRepository->find($id);
        $this->usersRepository->delete($id);
        return true;

        // if (empty($users)) {
            // Flash::error('Users not found');
            // return redirect(route('users.index'));
        // }
        // Flash::success('Users deleted successfully.');
        // return redirect(route('users.index'));
    }

    public function criateFullUser(Request $request) {
        $input = $request->all();

        //TODO: userLoggued
        $userLogged = json_decode(Auth::guard('web')->user());
        $userLogged = json_decode($request['userLogged']);

        $user = $this->usersRepository->criateFullUser($input, $userLogged);
        return $user->toJson();
    }

    public function updateFullUser(Request $request) {
        return  $this->usersRepository->updateFullUser($request);
    }

    public function deleteFullUser(Request $request) {
        return  $this->usersRepository->deleteFullUser($request);
    }

}
