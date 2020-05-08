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

    public function getCompanies($strFilter = '', $page = 0) {

        $page_length = env('APP_PAGE_LENGTH', 100);
        $start = $page_length * $page;
        $Companies = $this->model()
            ::where(function($query) use ($strFilter){
                if ($strFilter != '') {
                    $query
                        ->where('social_reason', 'LIKE', '%'. $strFilter.'%')
                        ->orWhere('fantasy_name', 'LIKE', '%'. $strFilter.'%')
                        ->orWhere('phone', 'LIKE', '%'. $strFilter.'%')
                        ->orWhere('phone2', 'LIKE', '%'. $strFilter.'%')
                        ->orWhere('decription', 'LIKE', '%'. $strFilter.'%')
                        ->orWhere('observation', 'LIKE', '%'. $strFilter.'%')
                        ->orWhere('cnpj', 'LIKE', '%'. $strFilter.'%');
                }})
            ->get()
            ->slice($start, $page_length)
            ->each(function(Companies $Company) {
                    $Company->CostCenters = null; //TODO-Alberto: obter os centros de costos de cada empresa
                });

        return $Companies;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Companies::class;
    }
}
