<?php

namespace App\Repositories;

use App\Mail\EmailSigninUser;
use App\Models\Users;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Mail;

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
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    public function signInUser($input) {
      // 1. cria admin
      $User = $this->model()::create($input); // $User= $this->model()::find(4);

      // 2. envia credenciais de acesso por email
      $User->password = rand(100001, 999999);
      Mail
        ::to($User->email)
        // ->cc('copy@email.com')
        ->send(new EmailSigninUser($User, 'Cadastro Physiback'));
      $User->password = bcrypt($User->password);

      // 3. Salvar senha cifrada
      $User->save();

      return $User;
    }

    public function filterUsers($input) {
      $filter = $input['filter'] ?? '';
      $role_id = $input['role_id'] ?? 0;
      $company_id = $input['company_id'] ?? 0;
      $cost_center_id = $input['cost_center_id'] ?? 0;
      $status_id = $input['status_id'] ?? 0;
      return $this->model()
          ::where(function($query) use ($filter){
            if ($filter != '') {
              $query->where('username', $filter)
              ->orWhere('email', 'LIKE', '%'. $filter.'%');
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
          ->get();
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Users::class;
    }
}
