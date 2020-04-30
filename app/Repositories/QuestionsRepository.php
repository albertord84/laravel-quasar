<?php

namespace App\Repositories;

use App\Models\Questions;
use App\Repositories\BaseRepository;

/**
 * Class QuestionsRepository
 * @package App\Repositories
 * @version April 30, 2020, 5:12 pm CDT
*/

class QuestionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
