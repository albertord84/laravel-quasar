<?php

namespace App\Repositories;

use App\Models\Companies;
use App\Repositories\BaseRepository;

/**
 * Class CompaniesRepository
 * @package App\Repositories
 * @version April 30, 2020, 5:05 pm CDT
*/

class CompaniesRepository extends BaseRepository
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
        return Companies::class;
    }
}
