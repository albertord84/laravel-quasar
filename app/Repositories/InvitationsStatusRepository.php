<?php

namespace App\Repositories;

use App\Models\InvitationsStatus;
use App\Repositories\BaseRepository;

/**
 * Class InvitationsStatusRepository
 * @package App\Repositories
 * @version July 19, 2020, 8:16 am CDT
*/

class InvitationsStatusRepository extends BaseRepository
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
        return InvitationsStatus::class;
    }
}
