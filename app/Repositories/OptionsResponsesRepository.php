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

    /**
     * Configure the Model
     **/
    public function model()
    {
        return OptionsResponses::class;
    }
}
