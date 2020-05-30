<?php

namespace App\Repositories;

use App\Mail\EmailSigninUser;
use App\Models\Address;
use App\Models\Companies;
use App\Models\Users;
use App\Models\UsersRoles;
use App\Models\UsersStatus;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\User;


/**
 * Class UsersRepository
 * @package App\Repositories
 * @version May 5, 2020, 5:26 pm CDT
*/

class UsersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_id',
        'cost_center_id',
        'address_id',
        'role_id',
        'status_id',
        'username',
        'email',
        'password',
        'email_verified_at',
        'remember_token'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable() {
        return $this->fieldSearchable;
    }

    public function filterUsers($input) {
      // TODO-JR: filtar segundo role do usuario logado
      // dd(Auth::guard('web'));
      // $userLogued->role_id = 2;

      $filter = $input['filter'] ?? '';
      $role_id = $input['role_id'] ?? 0;
      $id = $input['id'] ?? 0;

      $company_id = $input['company_id'] ?? 0;
      $cost_center_id = $input['cost_center_id'] ?? 0;
      $status_id = $input['status_id'] ?? 0;

      $page = $input['page'] ?? 0;
      $deleted_at = $input['deleted'] ?? 0;
      $created_at = $input['created'] ?? 0;
      $updated_at = $input['updated'] ?? 0;

      $page_length = env('APP_PAGE_LENGTH', 100);
      $start = $page_length * $page;

      return $this->model()
          ::where(function($query) use ($filter){
            if ($filter != '') {
              $query->where('username', 'LIKE', '%'. $filter.'%')
              ->orWhere('email', 'LIKE', '%'. $filter.'%');
            }})
          ->where(function($query) use ($id){
            if ($id) {
              $query->where('id', $id);
            }})
          ->where(function($query) use ($role_id){
            if ($role_id) {
              $query->where('role_id', $role_id);
            }})
          ->where(function($query) use ($company_id){
            if ($company_id) {
              $query->where('company_id', $company_id);
            }})
          ->where(function($query) use ($cost_center_id){
            if ($cost_center_id) {
              $query->where('cost_center_id', $cost_center_id);
            }})
          ->where(function($query) use ($status_id){
            if ($status_id) {
              $query->where('status_id', $status_id);
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
          ->each(function(Users $User) {
              $User->Address = Address::where('id', $User->address_id)->get()->first();
              $User->UsersRole = UsersRoles::where('id', $User->role_id)->get()->first();
              $User->UsersStatus = UsersStatus::where('id', $User->status_id)->get()->first();
              $User->Company = Companies::where('id', $User->company_id)->get()->first();
          });
    }

    public function criateFullUser($input) {
      $userModel = $input['userModel'];
      $addressModel = (isset($input['addressModel']) && isset($input['addressModel']['cep']) && $input['addressModel']['cep']!= '') ? $input['addressModel'] : null;
      $sendRegisterEmail = $input['sendRegisterEmail'] ?? null;

      $Address = null;
      if($addressModel){
        $Address = (new AddressRepository(app()))->create($addressModel);
      }

      // 1. cria admin
      if ($Address){
        $userModel['address_id'] = $Address->id;
      }
      $password = rand(100001, 999999);
      $userModel['password'] = $password;
      $User = User::create($userModel);
      $User->password = $password; // TODO-Alberto: essa asignacion no esta funcionando, mismo ese campo siendo fillable en la clase

      // 2. envia credenciais de acesso por email
      if ($sendRegisterEmail && $sendRegisterEmail == 'Sim'){
        Mail::to($User->email)
          // ->cc('copy@email.com')
          ->send(new EmailSigninUser($User, 'Cadastro Physiback'));
      }

      return $User;
    }

    public function updateFullUser($input) {
      $userModel = $input['userModel'];
      $addressModel = (isset($input['addressModel']) && isset($input['addressModel']['cep']) && $input['addressModel']['cep']!= '') ? $input['addressModel'] : null;

      // atualizar endereço
      if($addressModel){
        $Address = Address::where('id', $addressModel['id'])->first()->update($addressModel);
      }

      $User = $this->update($userModel, $userModel['id']);

      return $User;
    }

    public function deleteFullUser($request){
      // eliminar respostas a questionários e recompensas se é target

      //eliminar o usuário
      return true;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Users::class;
    }
}
