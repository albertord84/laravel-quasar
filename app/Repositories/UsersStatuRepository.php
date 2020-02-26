<?php

namespace App\Repositories;

use App\Models\UsersStatu;
use App\Repositories\BaseRepository;

/**
 * Class UsersStatuRepository
 * @package App\Repositories
 * @version February 26, 2020, 8:20 am CST
*/

class UsersStatuRepository extends BaseRepository
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
        return UsersStatu::class;
    }
}
