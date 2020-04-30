<?php

namespace App\Repositories;

use App\Models\QuestionsTypes;
use App\Repositories\BaseRepository;

/**
 * Class QuestionsTypesRepository
 * @package App\Repositories
 * @version April 30, 2020, 5:00 pm CDT
*/

class QuestionsTypesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'decription'
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
        return QuestionsTypes::class;
    }
}
