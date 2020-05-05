<?php

namespace App\Repositories;

use App\Models\Questionnaires;
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

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Questionnaires::class;
    }
}
