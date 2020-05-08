<?php

namespace App\Repositories;

use App\Models\Users;
use App\Repositories\BaseRepository;

/**
 * Class UsersRepository
 * @package App\Repositories
 * @version May 5, 2020, 5:26 pm CDT
*/

class UsersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_id',
        'cost_center_id',
        'address_id',
        'role_id',
        'status_id',
        'username',
        'email',
        'password',
        'email_verified_at',
        'remember_token'
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

    public function getUsersByRole($filter = '', $role_id = 0) {
      return $this->model()
          ::where(function($query) use ($filter){
            if ($filter != '') {
              $query->where('username', $filter)
              ->orWhere('email', 'LIKE', '%'. $filter.'%');
            }})
          ->where(function($query) use ($role_id){
            if ($role_id) {
              $query->where('role_id', $role_id);
            }})
          ->get();
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Users::class;
    }
}
