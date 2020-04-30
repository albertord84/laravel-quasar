<?php

namespace App\Repositories;

use App\Models\Campaigns;
use App\Repositories\BaseRepository;

/**
 * Class CampaignsRepository
 * @package App\Repositories
 * @version April 30, 2020, 5:12 pm CDT
*/

class CampaignsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status_id',
        'criator_id',
        'updater_id',
        'questionary_id',
        'base_id',
        'name',
        'objetive',
        'description',
        'observation',
        'response_limit',
        'response_amount',
        'invitations_sent',
        'invitations_accepted',
        'invitations_declined',
        'requested_date',
        'analyzed_date',
        'start_date',
        'end_date'
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
        return Campaigns::class;
    }
}
