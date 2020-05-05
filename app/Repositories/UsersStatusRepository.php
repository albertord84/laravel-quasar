<?php

namespace App\Repositories;

use App\Models\UsersStatus;
use App\Repositories\BaseRepository;

/**
 * Class UsersStatusRepository
 * @package App\Repositories
 * @version May 5, 2020, 5:23 pm CDT
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
