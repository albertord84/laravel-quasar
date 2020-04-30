<?php

namespace App\Repositories;

use App\Models\AccountsBanks;
use App\Repositories\BaseRepository;

/**
 * Class AccountsBanksRepository
 * @package App\Repositories
 * @version April 30, 2020, 5:34 pm CDT
*/

class AccountsBanksRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'bank',
        'agency',
        'account',
        'account_type',
        'dig',
        'titular_name',
        'titular_cpf'
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
        return AccountsBanks::class;
    }
}
