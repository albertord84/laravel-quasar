<?php

namespace App\Repositories;

use App\Models\BasesOrigins;
use App\Repositories\BaseRepository;

/**
 * Class BasesOriginsRepository
 * @package App\Repositories
 * @version April 30, 2020, 5:04 pm CDT
*/

class BasesOriginsRepository extends BaseRepository
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
        return BasesOrigins::class;
    }
}
