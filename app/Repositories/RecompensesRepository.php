<?php

namespace App\Repositories;

use App\Models\Recompenses;
use App\Repositories\BaseRepository;

/**
 * Class RecompensesRepository
 * @package App\Repositories
 * @version May 5, 2020, 5:33 pm CDT
*/

class RecompensesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'questionnaire_id',
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
