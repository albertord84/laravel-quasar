<?php

namespace App\Repositories;

use App\Models\Companies;
use App\Repositories\BaseRepository;
use Auth;

use App\Http\Controllers\UsersRolesController;
use App\Models\CostsCenters;

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

    public function filterCompanies($input) {
        $filter = $input['filter'] ?? '';
        $page = $input['page'] ?? 0;
        $id = $input['id'] ?? 0;

        $deleted_at = $input['deleted'] ?? 0;
        $created_at = $input['created'] ?? 0;
        $updated_at = $input['updated'] ?? 0;

        $page_length = env('APP_PAGE_LENGTH', 20);
        $start = $page_length * $page;

        $Companies = $this->model()
            ::where(function($query) use ($filter){
                if ($filter != '') {
                    $query
                        ->where('social_reason', 'LIKE', '%'. $filter.'%')
                        ->orWhere('fantasy_name', 'LIKE', '%'. $filter.'%')
                        ->orWhere('phone', 'LIKE', '%'. $filter.'%')
                        ->orWhere('phone2', 'LIKE', '%'. $filter.'%')
                        ->orWhere('decription', 'LIKE', '%'. $filter.'%')
                        ->orWhere('observation', 'LIKE', '%'. $filter.'%')
                        ->orWhere('cnpj', 'LIKE', '%'. $filter.'%');
                }})
            ->where(function($query) use ($id){
              if ($id) {
                $query->where('id', $id);
              }})
            ->where(function($query) use ($deleted_at){
              if ($deleted_at) {
                $query->where('deleted_at', '>=', $deleted_at[0])
                      ->where('deleted_at', '<=', $deleted_at[1]);
              }})
            ->where(function($query) use ($created_at){
              if ($created_at) {
                $query->where('created_at', '>=', $created_at[0])
                      ->where('created_at', '<=', $created_at[1]);
              }})
            ->where(function($query) use ($updated_at){
              if ($updated_at) {
                $query->where('updated_at', '>=', $updated_at[0])
                      ->where('updated_at', '<=', $updated_at[1]);
              }})
            ->get()
            ->slice($start, $page_length)
            ->each(function(Companies $Company) {
                    $Company->CostCenters = null; //TODO-Alberto: obter todos os centros de costos de cada empresa en forma de Collection
                    $Company->Address = null; //TODO-Alberto: obter o endereço de cada empresa
                    $Company->Admin = null; //TODO-Alberto: obter os admin de cada empresa
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
