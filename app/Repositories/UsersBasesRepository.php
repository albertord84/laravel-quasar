<?php

namespace App\Repositories;

use App\Models\UsersBases;
use App\Repositories\BaseRepository;

/**
 * Class UsersBasesRepository
 * @package App\Repositories
 * @version May 5, 2020, 5:27 pm CDT
*/

class UsersBasesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'base_id',
        'user_id'
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

    public function filterUsersBases($input) {
      $filter = $input['filter'] ?? '';
      $page = $input['page'] ??  0;
      $id = $input['id'] ?? 0;

      $base_id = $input['base_id'] ?? 0;
      $user_id = $input['user_id'] ?? 0;

      $deleted_at = $input['deleted'] ?? 0;
      $created_at = $input['created'] ?? 0;
      $updated_at = $input['updated'] ?? 0;

      $page_length = env('APP_PAGE_LENGTH', 100);
      $start = $page_length * $page;

      return $this->model()
          ::where(function($query) use ($id){
            if ($id) {
              $query->where('id', $id);
            }})

          ->where(function($query) use ($base_id){
            if ($base_id) {
              $query->where('base_id', $base_id);
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
          ->each(function(UsersBases $UserBase) {
            // $Questions->Questions = null;
      });
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UsersBases::class;
    }
}
