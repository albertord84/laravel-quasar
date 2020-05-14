<?php

namespace App\Models;

// use Eloquent as Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Users
 * @package App\Models
 * @version May 5, 2020, 5:26 pm CDT
 *
 * @property integer company_id
 * @property integer cost_center_id
 * @property integer address_id
 * @property integer role_id
 * @property integer status_id
 * @property string username
 * @property string email
 * @property string password
 * @property string|\Carbon\Carbon email_verified_at
 * @property string remember_token
 */
class Users extends Model
{
    use SoftDeletes;

    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'company_id',
        'cost_center_id',
        'address_id',
        'role_id',
        'status_id',
        'username',
        'email',
        'password',
        'email_verified_at',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'integer',
        'cost_center_id' => 'integer',
        'address_id' => 'integer',
        'role_id' => 'integer',
        'status_id' => 'integer',
        'username' => 'string',
        'email' => 'string',
        'password' => 'string',
        'email_verified_at' => 'datetime',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'company_id' => 'required',
        'cost_center_id' => 'required',
        'address_id' => 'required',
        'role_id' => 'required',
        'status_id' => 'required',
        'username' => 'required',
        'email' => 'required',
        'password' => 'required'
    ];

    public function accountBank() {
      return $this->hasOne('App\Models\AccountsBanks');
    }
}
