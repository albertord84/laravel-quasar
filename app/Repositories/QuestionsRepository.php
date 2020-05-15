<?php

namespace App\Repositories;

use App\Models\Questions;
use App\Repositories\BaseRepository;

/**
 * Class QuestionsRepository
 * @package App\Repositories
 * @version May 5, 2020, 5:27 pm CDT
*/

class QuestionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'questionnaire_id',
        'type_id',
        'response_type_id',
        'question',
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

    public function filterQuestions($input) {
      $filter = $input['filter'] ?? '';
      $page = $input['page'] ??  0;
      $id = $input['id'] ?? 0;

      $questionnaire_id = $input['questionnaire_id'] ?? 0;
      $type_id = $input['type_id'] ?? 0;
      $response_type_id = $input['response_type_id'] ?? 0;

      $deleted_at = $input['deleted'] ?? 0;
      $created_at = $input['created'] ?? 0;
      $updated_at = $input['updated'] ?? 0;

      $page_length = env('APP_PAGE_LENGTH', 100);
      $start = $page_length * $page;

      return $this->model()
          ::where(function($query) use ($filter){
            if ($filter != '') {
              $query->where('question', 'LIKE', '%'. $filter.'%')
                    ->where('json_data', 'LIKE', '%'. $filter.'%');
            }})
          ->where(function($query) use ($id){
            if ($id) {
              $query->where('id', $id);
            }})

          ->where(function($query) use ($questionnaire_id){
            if ($questionnaire_id) {
              $query->where('questionnaire_id', $questionnaire_id);
            }})
          ->where(function($query) use ($type_id){
            if ($type_id) {
              $query->where('type_id', $type_id);
            }})
          ->where(function($query) use ($response_type_id){
            if ($response_type_id) {
              $query->where('response_type_id', $response_type_id);
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
          ->each(function(Questions $Questions) {
            // $Questions->Questions = null;
      });
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Questions::class;
    }
}
