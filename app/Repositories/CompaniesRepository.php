<?php

namespace App\Repositories;

use App\Models\Companies;
use App\Repositories\BaseRepository;
use Auth;

use App\Http\Controllers\UsersRolesController;

/**
 * Class CompaniesRepository
 * @package App\Repositories
 * @version May 5, 2020, 5:25 pm CDT
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

    public function getCompanies() {
        $this->with('costCenters')->orderBy('updated_at', 'desc');
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Companies::class;
    }
}
