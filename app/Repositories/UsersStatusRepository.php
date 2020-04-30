<?php

namespace App\Repositories;

use App\Models\UsersStatus;
use App\Repositories\BaseRepository;

/**
 * Class UsersStatusRepository
 * @package App\Repositories
 * @version April 30, 2020, 4:59 pm CDT
*/

class UsersStatusRepository extends BaseRepository
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
        return UsersStatus::class;
    }
}
