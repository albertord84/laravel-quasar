<?php

namespace App\Repositories;

use App\Models\CampaignsStatus;
use App\Repositories\BaseRepository;

/**
 * Class CampaignsStatusRepository
 * @package App\Repositories
 * @version April 30, 2020, 4:59 pm CDT
*/

class CampaignsStatusRepository extends BaseRepository
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
        return CampaignsStatus::class;
    }
}