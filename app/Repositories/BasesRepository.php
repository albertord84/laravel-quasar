<?php

namespace App\Repositories;

use App\Models\Bases;
use App\Repositories\BaseRepository;

/**
 * Class BasesRepository
 * @package App\Repositories
 * @version May 5, 2020, 5:25 pm CDT
*/

class BasesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'origin_id',
        'company_id',
        'criator_id',
        'name',
        'decription',
        'json_data'
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

    public function filterBases($input) {
      $filter = $input['filter'] ?? '';
      $page = $input['page'] ??  0;
      $id = $input['id'] ?? 0;

      $origin_id = $input['origin_id'] ?? 0;
      $company_id = $input['company_id'] ?? 0;
      $criator_id = $input['criator_id'] ?? 0;

      $deleted_at = $input['deleted'] ?? 0;
      $created_at = $input['created'] ?? 0;
      $updated_at = $input['updated'] ?? 0;

      $page_length = env('APP_PAGE_LENGTH', 100);
      $start = $page_length * $page;

      return $this->model()
          ::where(function($query) use ($filter){
            if ($filter != '') {
              $query->where('name', 'LIKE', '%'. $filter.'%')
              ->orWhere('decription', 'LIKE', '%'. $filter.'%')
              ->orWhere('json_data', 'LIKE', '%'. $filter.'%');
            }})
          ->where(function($query) use ($id){
            if ($id) {
              $query->where('id', $id);
            }})
          ->where(function($query) use ($origin_id){
            if ($origin_id) {
              $query->where('origin_id', $origin_id);
            }})
          ->where(function($query) use ($company_id){
            if ($company_id) {
              $query->where('company_id', $company_id);
            }})
          ->where(function($query) use ($criator_id){
            if ($criator_id) {
              $query->where('criator_id', $criator_id);
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
          ->each(function(Bases $Base) {
                  // $Base->Admin = null;
          });
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Bases::class;
    }
}
