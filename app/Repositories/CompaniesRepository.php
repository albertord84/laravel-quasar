<?php

namespace App\Repositories;

use App\Models\Companies;
use App\Repositories\BaseRepository;

/**
 * Class CompaniesRepository
 * @package App\Repositories
 * @version May 1, 2020, 7:30 am CDT
*/

class CompaniesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'responsible_id',
        'address_id',
        'social_reason',
        'fantasy_name',
        'cnpj',
        'phone',
        'phone2',
        'decription',
        'observation'
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
