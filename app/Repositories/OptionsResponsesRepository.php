<?php

namespace App\Repositories;

use App\Models\OptionsResponses;
use App\Repositories\BaseRepository;

/**
 * Class OptionsResponsesRepository
 * @package App\Repositories
 * @version April 30, 2020, 6:42 pm CDT
*/

class OptionsResponsesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'question_id',
        'response',
        'truth'
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

    public function filterOptionsResponses($input) {
      $filter = $input['filter'] ?? '';
      $page = $input['page'] ??  0;
      $id = $input['id'] ?? 0;

      $question_id = $input['question_id'] ?? 0;

      $deleted_at = $input['deleted'] ?? 0;
      $created_at = $input['created'] ?? 0;
      $updated_at = $input['updated'] ?? 0;

      $page_length = env('APP_PAGE_LENGTH', 100);
      $start = $page_length * $page;

      return $this->model()
          ::where(function($query) use ($filter){
            if ($filter != '') {
              $query->where('name', 'LIKE', '%'. $filter.'%');
            }})
          ->where(function($query) use ($id){
            if ($id) {
              $query->where('id', $id);
            }})
          ->where(function($query) use ($question_id){
            if ($question_id) {
              $query->where('question_id', $question_id);
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
          ->each(function(OptionsResponses $OptionResponse) {
            // $Base->Admin = null;
      });
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return OptionsResponses::class;
    }
}
