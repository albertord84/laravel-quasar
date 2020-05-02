<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Companies
 * @package App\Models
 * @version May 1, 2020, 7:55 pm CDT
 *
 * @property integer responsible_id
 * @property integer address_id
 * @property string social_reason
 * @property string fantasy_name
 * @property string cnpj
 * @property string phone
 * @property string phone2
 * @property string decription
 * @property string observation
 */
class Companies extends Model
{
    use SoftDeletes;

    public $table = 'companies';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'responsible_id',
        'address_id',
        'social_reason',
        'fantasy_name',
        'cnpj',
        'phone',
        'phone2',
        'decription',
        'observation'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'responsible_id' => 'integer',
        'address_id' => 'integer',
        'social_reason' => 'string',
        'fantasy_name' => 'string',
        'cnpj' => 'string',
        'phone' => 'string',
        'phone2' => 'string',
        'decription' => 'string',
        'observation' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'social_reason' => 'required',
        'fantasy_name' => 'required',
        'cnpj' => 'required'
    ];

    
}
