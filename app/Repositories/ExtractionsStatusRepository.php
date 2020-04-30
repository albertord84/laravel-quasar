<?php

namespace App\Repositories;

use App\Models\ExtractionsStatus;
use App\Repositories\BaseRepository;

/**
 * Class ExtractionsStatusRepository
 * @package App\Repositories
 * @version April 30, 2020, 4:59 pm CDT
*/

class ExtractionsStatusRepository extends BaseRepository
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
        return ExtractionsStatus::class;
    }
}