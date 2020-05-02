<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AccountsBanks
 * @package App\Models
 * @version May 1, 2020, 7:58 pm CDT
 *
 * @property integer user_id
 * @property string bank
 * @property string agency
 * @property string account
 * @property string account_type
 * @property string dig
 * @property string titular_name
 * @property string titular_cpf
 */
class AccountsBanks extends Model
{
    use SoftDeletes;

    public $table = 'accounts_banks';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'bank' => 'string',
        'agency' => 'string',
        'account' => 'string',
        'account_type' => 'string',
        'dig' => 'string',
        'titular_name' => 'string',
        'titular_cpf' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'bank' => 'required',
        'agency' => 'required',
        'account' => 'required',
        'titular_name' => 'required'
    ];

    
}
