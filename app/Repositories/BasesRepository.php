<?php

namespace App\Repositories;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\UsersRolesController;
use App\Http\Controllers\UsersStatusController;
use App\Models\Bases;
use App\Models\BasesOrigins;
use App\Models\Companies;
use App\Repositories\BaseRepository;
use App\Models\Users;
use App\Models\UsersBases;

/**
 * Class BasesRepository
 * @package App\Repositories
 * @version May 5, 2020, 5:25 pm CDT
*/

class BasesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'origin_id',
        'company_id',
        'criator_id',
        'name',
        'decription',
        'json_data'
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

    public function filterBases($input) {
      $filter = $input['filter'] ?? '';
      $page = $input['page'] ??  0;
      $id = $input['id'] ?? 0;

      $origin_id = $input['origin_id'] ?? 0;
      $company_id = $input['company_id'] ?? 0;
      $criator_id = $input['criator_id'] ?? 0;

      $deleted_at = $input['deleted'] ?? 0;
      $created_at = $input['created'] ?? 0;
      $updated_at = $input['updated'] ?? 0;

      $page_length = env('APP_PAGE_LENGTH', 100);
      $start = $page_length * $page;

      return $this->model()
          ::where(function($query) use ($filter){
            if ($filter != '') {
              $query->where('name', 'LIKE', '%'. $filter.'%')
              ->orWhere('decription', 'LIKE', '%'. $filter.'%')
              ->orWhere('json_data', 'LIKE', '%'. $filter.'%');
            }})
          ->where(function($query) use ($id){
            if ($id) {
              $query->where('id', $id);
            }})
          ->where(function($query) use ($origin_id){
            if ($origin_id) {
              $query->where('origin_id', $origin_id);
            }})
          ->where(function($query) use ($company_id){
            if ($company_id) {
              $query->where('company_id', $company_id);
            }})
          ->where(function($query) use ($criator_id){
            if ($criator_id) {
              $query->where('criator_id', $criator_id);
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
          ->each(function(Bases $Base) {
                $Base->BaseOrigin = BasesOrigins::where('id', $Base->origin_id)->get()->first();
                $Base->Company = Companies::where('id', $Base->company_id)->get()->first();
          });
    }

    public function inputUserFromCSV($file, $base_id){
        // $User = Auth::check() ? Auth::user() : session('logged_user');
        if (!$file) {
          abort(302, "Error uploading file!");
        } else {
            //1. Converter o arquivo a um array de usuários
            $wrongCSVContent = false;
            $Users = $this->csv_to_array($file->getRealPath(), ',');

            if($Users){
              if(count($Users)>1 && count($Users[1])<2 ){
                $Users = $this->csv_to_array($file->getRealPath(), ';');
                if(!$Users)
                  $wrongCSVContent = true;
              }
            } else{
              $wrongCSVContent = true;
            }
            unlink($file->getRealPath());
            if($wrongCSVContent){
              return $response["message0"] = array(
                "code" => "error",
                "cnt" => "Os dados no arquivo não estão no formato correto. Por favor, confira."
              );
            }

            // 2. Insertar ou actualizar cada usuário
            $i=2;
            $cntUserInvalid=0;
            $cntUserException=0;
            $cntUserUpdated=0;
            $cntUserCriated=0;
            foreach($Users as $user){
                try{
                    // 2.1 Validar dados. Se dados são válidos então
                    $json_data = [];
                    foreach ($user as $key => $value){
                      $user[$key] = trim($value);
                      if($key != 'Nome' && $key != 'Email')
                        $json_data[$key] = $user[$key];
                    }
                    if (!isset($user['Email']) && filter_var($user['Email'], FILTER_VALIDATE_EMAIL)  && isset($user['Nome']) && preg_match("/^[a-z A-Z0-9çÇáÁéÉíÍóÓúÚàÀèÈìÌòÒùÙãÃõÕâÂêÊôÔûÛñ\._-]{2,250}$/" , $user['Nome']) ) {
                      $cntUserInvalid++;
                    } else{
                          // - formatar o objeto de dados do usuário
                        $User = Users::where('email', $user['Email'])->get()->first();
                        $newUserFlag = false;
                        if(!$User){
                          $newUserFlag = true;
                          $User = new Users();
                          $User->role_id = UsersRolesController::TARGET;
                          $User->status_id = UsersStatusController::BEGINNER;
                          $User->email = $user['Email'];
                        }
                        $User->username = $user['Nome'];
                        $User->json_data = json_encode($json_data);
                        $User->save();
                        $User = Users::where('email', $user['Email'])->get()->first();

                        $UsersBases = UsersBases::where('base_id', $base_id)->where('user_id', $User->id)->get()->first();
                        if (!$UsersBases) {
                          $UsersBases = new UsersBases();
                          $UsersBases->base_id = $base_id;
                          $UsersBases->user_id = $User->id;
                          $UsersBases->save();
                        }

                        if($newUserFlag){
                          $cntUserCriated++;
                        }else {
                          $cntUserUpdated++;
                        }
                      }
                } catch (\Throwable $th) {
                  $cntUserException++;
                }
            }
      }
      $response = array(
            'cntUserInvalid' => $cntUserInvalid,
            'cntUserException' => $cntUserException,
            'cntUserUpdated' => $cntUserUpdated,
            'cntUserCriated' => $cntUserCriated
      );
      return json_encode($response);
    }

    public function csv_to_array($filename='', $delimiter=',') {
      if(!file_exists($filename) || !is_readable($filename))
        return FALSE;
      $header = NULL;
      $data = array();
      if (($handle = fopen($filename, 'r')) !== FALSE) {
          while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
          if(!$header)
              $header = $row;
          else {
              try{
                  $data[] = array_combine($header, $row);
              } catch (\Throwable $th) {
                  return null;
              }
          }
        }
        fclose($handle);
      }
      return $data;
    }

    public function deleteFullBase($request){
      $base = $request['base'];

      // Eliminar todas los UserBases
      UsersBases::where('base_id', $base['id'])->delete();

      // Eliminar la base
      $this->delete($base['id']);

      return true;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Bases::class;
    }
}
