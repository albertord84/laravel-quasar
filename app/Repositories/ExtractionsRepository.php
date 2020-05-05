<?php

namespace App\Repositories;

use App\Models\Extractions;
use App\Repositories\BaseRepository;

/**
 * Class ExtractionsRepository
 * @package App\Repositories
 * @version May 5, 2020, 5:32 pm CDT
*/

class ExtractionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status_id',
        'user_id',
        'requested_value',
        'payed_value'
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
        return Extractions::class;
    }
}
