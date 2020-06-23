<?php

namespace App\Repositories;

use App\Models\Invitations;
use App\Repositories\BaseRepository;
use App\Repositories\CampaignsRepository;
use App\Models\Users;
use App\Models\Campaigns;
use App\Models\Companies;

/**
 * Class InvitationsRepository
 * @package App\Repositories
 * @version June 21, 2020, 9:34 am CDT
*/

class InvitationsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'campaign_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    public function filterInvitations($input) {
      $page = $input['page'] ??  0;
      $id = $input['id'] ?? 0;

      $user_id = $input['user_id'] ?? 0;
      $campaign_id = $input['campaign_id'] ?? 0;
      $campaign_id = $input['campaign_id'] ?? 0;

      $updated_at = $input['updated_at'] ?? 0;
      $deleted_at = $input['deleted'] ?? 0;
      $created_at = $input['created'] ?? 0;
      $accepted = $input['accepted'] ?? 0;

      $page_length = env('APP_PAGE_LENGTH', 100);
      $start = $page_length * $page;

      return $this->model()
          ::where(function($query) use ($id){
            if ($id) {
              $query->where('id', $id);
            }})
          ->where(function($query) use ($user_id){
            if ($user_id) {
              $query->where('user_id', $user_id);
            }})
          ->where(function($query) use ($campaign_id){
            if ($campaign_id) {
              $query->where('campaign_id', $campaign_id);
            }})
          ->where(function($query) use ($accepted){
            if ($accepted) {
              $query->where('accepted', $accepted);
            }})

          ->where(function($query) use ($deleted_at){
            if ($deleted_at) {
              $query->where('deleted_at', '>=', $deleted_at[0])
                    ->where('deleted_at', '<=', $deleted_at[1]);
            }})
          ->where(function($query) use ($created_at){
            if ($created_at) {
              $query->where('created_at', '>=', $created_at[0])
                    ->where('created_at', '<=', $created_at[1]);
            }})
          ->where(function($query) use ($updated_at){
            if ($updated_at) {
              $query->where('updated_at', '>=', $updated_at[0])
                    ->where('updated_at', '<=', $updated_at[1]);
            }})
          ->get()
          ->slice($start, $page_length)
          ->each(function(Invitations $Invitation) {
                $arr = array('id'=>$Invitation->campaign_id);
                $Invitation->Campaign = (new CampaignsRepository(app()))->filterCampaigns($arr, null)[0];
                $Invitation->User = Users::where('id', $Invitation->user_id)->get()->first();
                $Invitation->Company = Companies::where('id', $Invitation->Campaign->id)->get()->first();
      });
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Invitations::class;
    }
}
