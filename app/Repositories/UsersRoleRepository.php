<?php

namespace App\Repositories;

use App\Models\UsersRole;
// use App\Repositories\BaseRepository;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UsersRoleRepository
 * @package App\Repositories
 * @version February 26, 2020, 8:13 am CST
*/

class UsersRoleRepository extends BaseRepository
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
        return UsersRole::class;
    }
}
