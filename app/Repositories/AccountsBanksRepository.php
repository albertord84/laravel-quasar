<?php

namespace App\Repositories;

use App\Models\AccountsBanks;
use App\Repositories\BaseRepository;

/**
 * Class AccountsBanksRepository
 * @package App\Repositories
 * @version May 1, 2020, 7:58 pm CDT
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
