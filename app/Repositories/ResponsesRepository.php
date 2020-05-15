<?php

namespace App\Repositories;

use App\Models\Responses;
use App\Repositories\BaseRepository;

/**
 * Class ResponsesRepository
 * @package App\Repositories
 * @version May 5, 2020, 5:32 pm CDT
*/

class ResponsesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'question_id',
        'campaign_id',
        'response_option_id',
        'discursive_text'
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

    public function filterResponses($input) {
      $filter = $input['filter'] ?? '';
      $page = $input['page'] ??  0;
      $id = $input['id'] ?? 0;

      $question_id = $input['question_id'] ?? 0;
      $user_id = $input['user_id'] ?? 0;
      $campaign_id = $input['campaign_id'] ?? 0;
      $response_option_id = $input['response_option_id'] ?? 0;

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
          ->where(function($query) use ($question_id){
            if ($question_id) {
              $query->where('question_id', $question_id);
            }})
          ->where(function($query) use ($user_id){
            if ($user_id) {
              $query->where('user_id', $user_id);
            }})
          ->where(function($query) use ($campaign_id){
            if ($campaign_id) {
              $query->where('campaign_id', $campaign_id);
            }})
          ->where(function($query) use ($response_option_id){
            if ($response_option_id) {
              $query->where('response_option_id', $response_option_id);
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
          ->each(function(Responses $Response) {
            // $Questions->Questions = null;
      });
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Responses::class;
    }
}
