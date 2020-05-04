<?php

namespace App\Repositories;

use App\Models\Questions;
use App\Repositories\BaseRepository;

/**
 * Class QuestionsRepository
 * @package App\Repositories
 * @version May 1, 2020, 7:57 pm CDT
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

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Questions::class;
    }
}
