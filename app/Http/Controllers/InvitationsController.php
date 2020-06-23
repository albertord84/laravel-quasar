<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInvitationsRequest;
use App\Http\Requests\UpdateInvitationsRequest;
use App\Repositories\InvitationsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class InvitationsController extends AppBaseController
{
    /** @var  InvitationsRepository */
    private $invitationsRepository;

    public function __construct(InvitationsRepository $invitationsRepo)
    {
        $this->invitationsRepository = $invitationsRepo;
    }

    /**
     * Display a listing of the Invitations.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $input = $request->all();
        $invitations = $this->invitationsRepository->filterInvitations($input);
        return $invitations->toJson();

        // $invitations = $this->invitationsRepository->all();

        // return view('invitations.index')
        //     ->with('invitations', $invitations);
    }

    /**
     * Show the form for creating a new Invitations.
     *
     * @return Response
     */
    public function create()
    {
        return view('invitations.create');
    }

    /**
     * Store a newly created Invitations in storage.
     *
     * @param CreateInvitationsRequest $request
     *
     * @return Response
     */
    public function store(CreateInvitationsRequest $request)
    {
        $input = $request->all();

        $invitations = $this->invitationsRepository->create($input);

        return $invitations->toJson();

        // Flash::success('Invitations saved successfully.');
        // return redirect(route('invitations.index'));
    }

    /**
     * Display the specified Invitations.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $invitations = $this->invitationsRepository->find($id);

        if (empty($invitations)) {
            Flash::error('Invitations not found');

            return redirect(route('invitations.index'));
        }

        return view('invitations.show')->with('invitations', $invitations);
    }

    /**
     * Show the form for editing the specified Invitations.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $invitations = $this->invitationsRepository->find($id);

        if (empty($invitations)) {
            Flash::error('Invitations not found');

            return redirect(route('invitations.index'));
        }

        return view('invitations.edit')->with('invitations', $invitations);
    }

    /**
     * Update the specified Invitations in storage.
     *
     * @param int $id
     * @param UpdateInvitationsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInvitationsRequest $request)
    {
        $invitations = $this->invitationsRepository->find($id);

        if (empty($invitations)) {
            Flash::error('Invitations not found');

            return redirect(route('invitations.index'));
        }

        $invitations = $this->invitationsRepository->update($request->all(), $id);

        return $invitations->toJson();

        // Flash::success('Invitations updated successfully.');

        // return redirect(route('invitations.index'));
    }

    /**
     * Remove the specified Invitations from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $invitations = $this->invitationsRepository->find($id);

        if (empty($invitations)) {
            Flash::error('Invitations not found');

            return redirect(route('invitations.index'));
        }

        $this->invitationsRepository->delete($id);

        // Flash::success('Invitations deleted successfully.');

        // return redirect(route('invitations.index'));
    }
}
