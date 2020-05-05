<?php

namespace App\Repositories;

use App\Models\Bases;
use App\Repositories\BaseRepository;

/**
 * Class BasesRepository
 * @package App\Repositories
 * @version May 5, 2020, 5:25 pm CDT
*/

class BasesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'origin_id',
        'company_id',
        'criator_id',
        'name',
        'decription',
        'json_data'
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
        return Bases::class;
    }
}
