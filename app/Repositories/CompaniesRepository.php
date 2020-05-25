<?php

namespace App\Repositories;

use App\Models\Companies;
use App\Repositories\BaseRepository;
use Auth;

use App\Http\Controllers\UsersRolesController;
use App\Models\Address;
use App\Models\CostsCenters;
use App\Models\Users;

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
    public function getFieldsSearchable(){
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
                    $Company->CostCenters = CostsCenters::where('company_id',$Company->id)->get();
                    $Company->Address = Address::where('id',$Company->address_id)->get()->first();
                    $Company->Admin = Users::where('id',$Company->responsible_id)->get()->first();
            });

        return $Companies;
    }

    public function criateFullCompany ($request) {
      $inputCompany = $request['company'];
      $inputAddress = $request['address'];
      $inputAdmin = $request['admin'];

      // 1. criar endereço
      $Address = (new AddressRepository(app()))->create($inputAddress);

      // 2. criar empresa
      $inputCompany['address_id'] = $Address->id;
      $inputCompany['responsible_id'] = $inputAdmin['id'];
      $Company = $this->create($inputCompany);

      // 3. criar primeiro centro de custo
      $CostCenter = (new CostsCentersRepository(app()))->create(array(
            'company_id' => $Company->id,
            'admin_id' => $inputAdmin['id'],
            'name' => 'Centro de custo 1'
      ));

      // 4. atualizar o company_id do admin
      $Admin = (new UsersRepository(app()))->find($inputAdmin['id']);
      $Admin->company_id = $Company->id;
      $Admin->save();

      $Company->Address = $Address;
      $Company->CostCenter = $CostCenter;
      $Company->Admin = $Admin;

      return $Company;
    }

    public function updateFullCompany ($request) {
      $inputCompany = $request['company'];
      $inputAddress = $request['address'];

      // 1. atualizar dados do endereço da empresa
      $Address = Address::where('id', $inputCompany['address_id'])->first()->update($inputAddress);

      // 2. atualizar dados da empresa
      $Company = $this->update($inputCompany, $inputCompany['id']);

      return $Company;
    }

    public function deleteFullCompany ($request) {
      return true;

      $Company = $request['company'];

      //Eliminar em cascada Campanhas->Questionários->Questões->Opções de Respostas->Respostas

      // Eliminar todos os centros de custo
      $CostCenter = CostsCenters::where('company_id', $Company->id)->delete();

      // Eliminar Administradores da empresa
      $Users = Users::where('id', $Company->company_id)->delete();

      // Eliminar o endereço
      $Address = Address::where('id', $Company->address_id)->delete();

      // 2. criar empresa
      $inputCompany['address_id'] = $Address->id;
      $inputCompany['responsible_id'] = $inputAdmin['id'];
      $Company = $this->create($inputCompany);



      $Company->Address = $Address;
      $Company->CostCenter = $CostCenter;
      $Company->Admin = $Admin;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Companies::class;
    }
}
