<?php

namespace App\Repositories;

use App\Models\ResponsesTypes;
use App\Repositories\BaseRepository;

/**
 * Class ResponsesTypesRepository
 * @package App\Repositories
 * @version April 30, 2020, 5:00 pm CDT
*/

class ResponsesTypesRepository extends BaseRepository
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
        return ResponsesTypes::class;
    }
}
