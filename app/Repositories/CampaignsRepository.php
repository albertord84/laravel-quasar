<?php

namespace App\Repositories;

use App\Models\Campaigns;
use App\Repositories\BaseRepository;

/**
 * Class CampaignsRepository
 * @package App\Repositories
 * @version May 5, 2020, 5:27 pm CDT
*/

class CampaignsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status_id',
        'criator_id',
        'updater_id',
        'questionary_id',
        'base_id',
        'name',
        'objetive',
        'description',
        'observation',
        'response_limit',
        'response_amount',
        'invitations_sent',
        'invitations_accepted',
        'invitations_declined',
        'invitations_send_date',
        'requested_date',
        'analyzed_date',
        'start_date',
        'end_date'
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

    public function filterCampaigns($input) {
      $filter = $input['filter'] ?? '';
      $page = $input['page'] ?? 0;
      $id = $input['id'] ?? 0;

      $status_id = $input['status_id'] ?? 0;
      $criator_id = $input['criator_id'] ?? 0;
      $updater_id = $input['updater_id'] ?? 0;
      $base_id = $input['base_id'] ?? 0;
      $requested_date = $input['requested_date'] ?? 0;
      $analyzed_date = $input['analyzed_date'] ?? 0;
      $start_date = $input['start_date'] ?? 0;
      $end_date = $input['end_date'] ?? 0;

      $deleted_at = $input['deleted_at'] ?? 0;
      $created_at = $input['created_at'] ?? 0;
      $updated_at = $input['updated_at'] ?? 0;

      $page_length = env('APP_PAGE_LENGTH', 100);
      $start = $page_length * $page;

      return $this->model()
          ::where(function($query) use ($filter){
            if ($filter != '') {
              $query->where('name','LIKE', '%'. $filter.'%')
                    ->orWhere('objetive', 'LIKE', '%'. $filter.'%')
                    ->orWhere('description', 'LIKE', '%'. $filter.'%')
                    ->orWhere('observation', 'LIKE', '%'. $filter.'%');
            }})
          ->where(function($query) use ($id){
            if ($id) {
              $query->where('id', $id);
            }})
          ->where(function($query) use ($status_id){
            if ($status_id) {
              $query->where('status_id', $status_id);
            }})
          ->where(function($query) use ($criator_id){
            if ($criator_id) {
              $query->where('criator_id', $criator_id);
            }})
          ->where(function($query) use ($updater_id){
            if ($updater_id) {
              $query->where('updater_id', $updater_id);
            }})
          ->where(function($query) use ($base_id){
            if ($base_id) {
              $query->where('base_id', $base_id);
            }})
          ->where(function($query) use ($requested_date){
            if ($requested_date) {
              $query->where('requested_date', '>=', $requested_date[0])
                    ->where('requested_date', '<=', $requested_date[1]);
            }})
          ->where(function($query) use ($analyzed_date){
            if ($analyzed_date) {
              $query->where('analyzed_date', '>=', $analyzed_date[0])
                    ->where('analyzed_date', '<=', $analyzed_date[1]);
            }})
          ->where(function($query) use ($start_date){
            if ($start_date) {
              $query->where('start_date', '>=', $start_date[0])
                    ->where('start_date', '<=', $start_date[1]);
            }})
          ->where(function($query) use ($end_date){
            if ($end_date) {
              $query->where('end_date', '>=', $end_date[0])
                    ->where('end_date', '<=', $end_date[1]);
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
          ->each(function(Campaigns $Campaign) {
                $Campaign->StatusCampaign = null; //TODO-Alberto
                $Campaign->Questionnaire = null; //TODO-Alberto: una campanha pode ter 0 ou 1 questionario
                $Campaign->UserCriator = null; //TODO-Alberto: usuário criador da campanha
                $Campaign->UserUpdater = null; //TODO-Alberto: usuário atualizador da campanha
                $Campaign->Base = null; //TODO-Alberto: base de usuário  campanha
          });
    }



    /**
     * Configure the Model
     **/
    public function model()
    {
        return Campaigns::class;
    }
}
