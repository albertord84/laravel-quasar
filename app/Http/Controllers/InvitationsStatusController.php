<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInvitationsStatusRequest;
use App\Http\Requests\UpdateInvitationsStatusRequest;
use App\Repositories\InvitationsStatusRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class InvitationsStatusController extends AppBaseController
{
    const SENDED = 1;
    const ACCEPTED = 2;
    const REJECTED = 3;
    const ANSWERED = 4;
    const CANCELLED = 5;
    const EXPIRED = 6;

    /** @var  InvitationsStatusRepository */
    private $invitationsStatusRepository;

    public function __construct(InvitationsStatusRepository $invitationsStatusRepo)
    {
        $this->invitationsStatusRepository = $invitationsStatusRepo;
    }

    /**
     * Display a listing of the InvitationsStatus.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $invitationsStatuses = $this->invitationsStatusRepository->all();

        return view('invitations_statuses.index')
            ->with('invitationsStatuses', $invitationsStatuses);
    }

    /**
     * Show the form for creating a new InvitationsStatus.
     *
     * @return Response
     */
    public function create()
    {
        return view('invitations_statuses.create');
    }

    /**
     * Store a newly created InvitationsStatus in storage.
     *
     * @param CreateInvitationsStatusRequest $request
     *
     * @return Response
     */
    public function store(CreateInvitationsStatusRequest $request)
    {
        $input = $request->all();

        $invitationsStatus = $this->invitationsStatusRepository->create($input);

        Flash::success('Invitations Status saved successfully.');

        return redirect(route('invitationsStatuses.index'));
    }

    /**
     * Display the specified InvitationsStatus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $invitationsStatus = $this->invitationsStatusRepository->find($id);

        if (empty($invitationsStatus)) {
            Flash::error('Invitations Status not found');

            return redirect(route('invitationsStatuses.index'));
        }

        return view('invitations_statuses.show')->with('invitationsStatus', $invitationsStatus);
    }

    /**
     * Show the form for editing the specified InvitationsStatus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $invitationsStatus = $this->invitationsStatusRepository->find($id);

        if (empty($invitationsStatus)) {
            Flash::error('Invitations Status not found');

            return redirect(route('invitationsStatuses.index'));
        }

        return view('invitations_statuses.edit')->with('invitationsStatus', $invitationsStatus);
    }

    /**
     * Update the specified InvitationsStatus in storage.
     *
     * @param int $id
     * @param UpdateInvitationsStatusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInvitationsStatusRequest $request)
    {
        $invitationsStatus = $this->invitationsStatusRepository->find($id);

        if (empty($invitationsStatus)) {
            Flash::error('Invitations Status not found');

            return redirect(route('invitationsStatuses.index'));
        }

        $invitationsStatus = $this->invitationsStatusRepository->update($request->all(), $id);

        Flash::success('Invitations Status updated successfully.');

        return redirect(route('invitationsStatuses.index'));
    }

    /**
     * Remove the specified InvitationsStatus from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $invitationsStatus = $this->invitationsStatusRepository->find($id);

        if (empty($invitationsStatus)) {
            Flash::error('Invitations Status not found');

            return redirect(route('invitationsStatuses.index'));
        }

        $this->invitationsStatusRepository->delete($id);

        Flash::success('Invitations Status deleted successfully.');

        return redirect(route('invitationsStatuses.index'));
    }
}
