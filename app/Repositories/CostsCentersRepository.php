<?php

namespace App\Repositories;

use App\Models\CostsCenters;
use App\Repositories\BaseRepository;

/**
 * Class CostsCentersRepository
 * @package App\Repositories
 * @version April 30, 2020, 5:05 pm CDT
*/

class CostsCentersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_id',
        'admin_id',
        'name'
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
        return CostsCenters::class;
    }
}
