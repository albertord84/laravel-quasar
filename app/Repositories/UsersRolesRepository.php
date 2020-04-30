<?php

namespace App\Repositories;

use App\Models\UsersRoles;
use App\Repositories\BaseRepository;

/**
 * Class UsersRolesRepository
 * @package App\Repositories
 * @version April 30, 2020, 4:38 pm CDT
*/

class UsersRolesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'decription'
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
        return UsersRoles::class;
    }
}
