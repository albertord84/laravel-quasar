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

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UsersBases::class;
    }
}
