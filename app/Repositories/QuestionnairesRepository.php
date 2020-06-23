<?php

namespace App\Repositories;

use App\Http\Controllers\UsersRolesController;
use App\Models\OptionsResponses;
use App\Models\Planes;
use App\Models\Questionnaires;
use App\Models\Questions;
use App\Models\Users;
use App\Repositories\QuestionsRepository;
use App\Repositories\BaseRepository;

/**
 * Class QuestionnairesRepository
 * @package App\Repositories
 * @version May 5, 2020, 5:27 pm CDT
*/

class QuestionnairesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'plane_id',
        'criator_id',
        'updater_id',
        'name',
        'description',
        'observation',
        'released'
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

    public function filterQuestionnaires($input, $userLogged) {

      $filter = $input['filter'] ?? '';
      $page = $input['page'] ??  0;
      $id = $input['id'] ?? 0;

      $plane_id = $input['plane_id'] ?? 0;
      $company_id = $input['company_id'] ?? 0;
      $criator_id = $input['criator_id'] ?? 0;
      $updater_id = $input['updater_id'] ?? 0;
      $released = $input['released'] ?? 0;

      $company_id  = (!$company_id && $userLogged && $userLogged->role_id == UsersRolesController::ADMIN) ? $userLogged->company_id : 0;

      $deleted_at = $input['deleted'] ?? 0;
      $created_at = $input['created'] ?? 0;
      $updated_at = $input['updated'] ?? 0;

      $page_length = env('APP_PAGE_LENGTH', 100);
      $start = $page_length * $page;

      return $this->model()
          ::where(function($query) use ($filter){
            if ($filter != '') {
              $query->where('name', 'LIKE', '%'. $filter.'%')
                    ->orWhere('description', 'LIKE', '%'. $filter.'%')
                    ->orWhere('observation', 'LIKE', '%'. $filter.'%');
            }})
          ->where(function($query) use ($id){
            if ($id) {
              $query->where('id', $id);
            }})
          ->where(function($query) use ($company_id){
            if ($company_id) {
              $query->where('company_id', $company_id);
            }})
          ->where(function($query) use ($plane_id){
            if ($plane_id) {
              $query->where('plane_id', $plane_id);
            }})
          ->where(function($query) use ($criator_id){
            if ($criator_id) {
              $query->where('criator_id', $criator_id);
            }})
          ->where(function($query) use ($updater_id){
            if ($updater_id) {
              $query->where('updater_id', $updater_id);
            }})
          ->where(function($query) use ($released){
            if ($released) {
              $query->where('released', $released);
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
          ->each(function(Questionnaires $Questionnaire) {
              $Questionnaire->Pages = Questions
                    ::where('questionnaire_id', $Questionnaire->id)
                    ->get()
                    ->each(function(Questions $Question) {
                        $Question->ResponseOptions = OptionsResponses::where('question_id', $Question->id)->get();
                    });
              $Questionnaire->Plane = Planes::where('id', $Questionnaire->plane_id)->get()->first();
              $Questionnaire->Criator = Users::where('id', $Questionnaire->criator_id)->get()->first();
              $Questionnaire->Updater = Users::where('id', $Questionnaire->updater_id)->get()->first();
      });
    }

    public function fullQuestionary($questionaryId) {
      // 1. buscar o questionário
      $Questionnaire = $this->find($questionaryId);
      if($Questionnaire){
        // 2. buscar as questões do questionário
        $Questionnaire->pages = Questions
              ::where('questionnaire_id', $questionaryId)
              ->get()
              ->each(function(Questions $Question) {
                  $Question->ResponseOptions = OptionsResponses::where('question_id', $Question->id)->get();
              });
        $Questionnaire->Plane = Planes::where('id', $Questionnaire->plane_id)->get()->first();
        $Questionnaire->Criator = Users::where('id', $Questionnaire->criator_id)->get()->first();
        $Questionnaire->Updater = Users::where('id', $Questionnaire->updater_id)->get()->first();

        // 3. buscar as OptionsResponses de cada questão
        return $Questionnaire;
      } else {
        return null;
      }
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Questionnaires::class;
    }
}
