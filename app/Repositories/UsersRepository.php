<?php

namespace App\Repositories;

use App\Models\Users;
use App\Repositories\BaseRepository;

/**
 * Class UsersRepository
 * @package App\Repositories
 * @version May 1, 2020, 7:56 pm CDT
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

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Users::class;
    }
}
