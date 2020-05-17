<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCampaignsRequest;
use App\Http\Requests\UpdateCampaignsRequest;
use App\Repositories\CampaignsRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\CampaignsStatus;
use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use Carbon\Carbon;

class CampaignsController extends AppBaseController
{
    /** @var  CampaignsRepository */
    private $campaignsRepository;

    public function __construct(CampaignsRepository $campaignsRepo)
    {
        $this->campaignsRepository = $campaignsRepo;
    }

    /**
     * Display a listing of the Campaigns.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $input = $request->all();
        $users = $this->campaignsRepository->filterCampaigns($input);
        return $users->toJson();

        // return view('campaigns.index')
        //     ->with('campaigns', $campaigns);
    }

    /**
     * Show the form for creating a new Campaigns.
     *
     * @return Response
     */
    public function create()
    {
        return view('campaigns.create');
    }

    /**
     * Store a newly created Campaigns in storage.
     *
     * @param CreateCampaignsRequest $request
     *
     * @return Response
     */
    public function store(CreateCampaignsRequest $request)
    {
        $input = $request->all();

        $campaigns = $this->campaignsRepository->create($input);

        Flash::success('Campaigns saved successfully.');

        return redirect(route('campaigns.index'));
    }

    /**
     * Display the specified Campaigns.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $campaigns = $this->campaignsRepository->find($id);

        if (empty($campaigns)) {
            Flash::error('Campaigns not found');

            return redirect(route('campaigns.index'));
        }

        return view('campaigns.show')->with('campaigns', $campaigns);
    }

    /**
     * Show the form for editing the specified Campaigns.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $campaigns = $this->campaignsRepository->find($id);

        if (empty($campaigns)) {
            Flash::error('Campaigns not found');

            return redirect(route('campaigns.index'));
        }

        return view('campaigns.edit')->with('campaigns', $campaigns);
    }

    /**
     * Update the specified Campaigns in storage.
     *
     * @param int $id
     * @param UpdateCampaignsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCampaignsRequest $request)
    {
        $campaigns = $this->campaignsRepository->find($id);

        if (empty($campaigns)) {
            Flash::error('Campaigns not found');

            return redirect(route('campaigns.index'));
        }

        $campaigns = $this->campaignsRepository->update($request->all(), $id);

        Flash::success('Campaigns updated successfully.');

        return redirect(route('campaigns.index'));
    }

    /**
     * Remove the specified Campaigns from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $campaigns = $this->campaignsRepository->find($id);

        if (empty($campaigns)) {
            Flash::error('Campaigns not found');

            return redirect(route('campaigns.index'));
        }

        $this->campaignsRepository->delete($id);

        Flash::success('Campaigns deleted successfully.');

        return redirect(route('campaigns.index'));
    }

    public function criateFullCampaign(Request $request) {
      $campaign = $request['campaign'];
      // $User = Auth::check()? Auth::user():session('logged_user');

      // 2020-05-24 23:59
      // $campaign['invitations_send_date'] = (new Carbon($campaign['invitations_send_date']));//->toFormattedDateString('Y-m-d H:i:s');
      // $campaign['start_date'] = (new Carbon($campaign['start_date']));//->toFormattedDateString('Y-m-d H:i:s');
      // $campaign['end_date'] = (new Carbon($campaign['end_date']));//->toFormattedDateString('Y-m-d H:i:s');


      $campaign['invitations_send_date'] = Carbon::parse( $campaign['invitations_send_date']. ':00')->format('Y-m-d H:i:s');
      $campaign['start_date'] = Carbon::parse( $campaign['start_date']. ':00')->format('Y-m-d H:i:s');
      $campaign['end_date'] = Carbon::parse( $campaign['end_date']. ':00')->format('Y-m-d H:i:s');
      // dd($campaign);
      $Campaign = (new CampaignsRepository(app()))->create($campaign);

      return $Campaign;
    }
}
