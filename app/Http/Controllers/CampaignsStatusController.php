<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCampaignsStatusRequest;
use App\Http\Requests\UpdateCampaignsStatusRequest;
use App\Repositories\CampaignsStatusRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CampaignsStatusController extends AppBaseController
{

    const CREATED = 1;
    const ACTIVED = 2;
    const PAUSED = 3;
    const DELETED  = 4;

    /** @var  CampaignsStatusRepository */
    private $campaignsStatusRepository;

    public function __construct(CampaignsStatusRepository $campaignsStatusRepo)
    {
        $this->campaignsStatusRepository = $campaignsStatusRepo;
    }

    /**
     * Display a listing of the CampaignsStatus.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $campaignsStatuses = $this->campaignsStatusRepository->all();
        return $campaignsStatuses->toJson();

        // return view('campaigns_statuses.index')
        //     ->with('campaignsStatuses', $campaignsStatuses);
    }

    /**
     * Show the form for creating a new CampaignsStatus.
     *
     * @return Response
     */
    public function create()
    {
        return view('campaigns_statuses.create');
    }

    /**
     * Store a newly created CampaignsStatus in storage.
     *
     * @param CreateCampaignsStatusRequest $request
     *
     * @return Response
     */
    public function store(CreateCampaignsStatusRequest $request)
    {
        $input = $request->all();

        $campaignsStatus = $this->campaignsStatusRepository->create($input);

        Flash::success('Campaigns Status saved successfully.');

        return redirect(route('campaignsStatuses.index'));
    }

    /**
     * Display the specified CampaignsStatus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $campaignsStatus = $this->campaignsStatusRepository->find($id);

        if (empty($campaignsStatus)) {
            Flash::error('Campaigns Status not found');

            return redirect(route('campaignsStatuses.index'));
        }

        return view('campaigns_statuses.show')->with('campaignsStatus', $campaignsStatus);
    }

    /**
     * Show the form for editing the specified CampaignsStatus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $campaignsStatus = $this->campaignsStatusRepository->find($id);

        if (empty($campaignsStatus)) {
            Flash::error('Campaigns Status not found');

            return redirect(route('campaignsStatuses.index'));
        }

        return view('campaigns_statuses.edit')->with('campaignsStatus', $campaignsStatus);
    }

    /**
     * Update the specified CampaignsStatus in storage.
     *
     * @param int $id
     * @param UpdateCampaignsStatusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCampaignsStatusRequest $request)
    {
        $campaignsStatus = $this->campaignsStatusRepository->find($id);

        if (empty($campaignsStatus)) {
            Flash::error('Campaigns Status not found');

            return redirect(route('campaignsStatuses.index'));
        }

        $campaignsStatus = $this->campaignsStatusRepository->update($request->all(), $id);

        Flash::success('Campaigns Status updated successfully.');

        return redirect(route('campaignsStatuses.index'));
    }

    /**
     * Remove the specified CampaignsStatus from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $campaignsStatus = $this->campaignsStatusRepository->find($id);

        if (empty($campaignsStatus)) {
            Flash::error('Campaigns Status not found');

            return redirect(route('campaignsStatuses.index'));
        }

        $this->campaignsStatusRepository->delete($id);

        Flash::success('Campaigns Status deleted successfully.');

        return redirect(route('campaignsStatuses.index'));
    }
}
