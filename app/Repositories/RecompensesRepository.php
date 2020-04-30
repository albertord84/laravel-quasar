<?php

namespace App\Repositories;

use App\Models\Recompenses;
use App\Repositories\BaseRepository;

/**
 * Class RecompensesRepository
 * @package App\Repositories
 * @version April 30, 2020, 5:34 pm CDT
*/

class RecompensesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'question_id',
        'campaign_id',
        'value'
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
        return Recompenses::class;
    }
}
