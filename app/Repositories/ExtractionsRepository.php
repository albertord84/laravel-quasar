<?php

namespace App\Repositories;

use App\Models\AccountsBanks;
use App\Models\Extractions;
use App\Models\ExtractionsStatus;
use App\Models\Users;
use App\Repositories\BaseRepository;

/**
 * Class ExtractionsRepository
 * @package App\Repositories
 * @version May 5, 2020, 5:32 pm CDT
*/

class ExtractionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status_id',
        'user_id',
        'requested_value',
        'payed_value'
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

    public function filterExtractions($input) {
      $filter = $input['filter'] ?? '';
      $page = $input['page'] ??  0;
      $id = $input['id'] ?? 0;

      $status_id = $input['status_id'] ?? 0;
      $user_id = $input['user_id'] ?? 0;

      $deleted_at = $input['deleted'] ?? 0;
      $created_at = $input['created'] ?? 0;
      $updated_at = $input['updated'] ?? 0;

      $page_length = env('APP_PAGE_LENGTH', 100);
      $start = $page_length * $page;

      return $this->model()
          ::where(function($query) use ($filter){
            if ($filter != '') {
              $query->where('name', 'LIKE', '%'. $filter.'%');
            }})
          ->where(function($query) use ($id){
            if ($id) {
              $query->where('id', $id);
            }})
          ->where(function($query) use ($status_id){
            if ($status_id) {
              $query->where('status_id', $status_id);
            }})
          ->where(function($query) use ($user_id){
            if ($user_id) {
              $query->where('user_id', $user_id);
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
          ->each(function(Extractions $Extraction) {
                $Extraction->ExtractionsStatus = ExtractionsStatus::where('id', $Extraction->status_id)->get()->first();
                $Extraction->User = Users::where('id', $Extraction->user_id)->get()->first();
                $Extraction->User->AccountBank = AccountsBanks::where('user_id', $Extraction->user_id)->get()->first();
      });
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Extractions::class;
    }
}
