<?php

namespace App\Repositories;

use App\Models\Responses;
use App\Repositories\BaseRepository;

/**
 * Class ResponsesRepository
 * @package App\Repositories
 * @version May 1, 2020, 7:58 pm CDT
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

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Responses::class;
    }
}
