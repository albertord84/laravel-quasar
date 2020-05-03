<?php

namespace App\Repositories;

use App\Models\Campaigns;
use App\Repositories\BaseRepository;

/**
 * Class CampaignsRepository
 * @package App\Repositories
 * @version May 1, 2020, 7:57 pm CDT
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
        'invitations_send_date',
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
