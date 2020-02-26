<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class UsersStatu
 * @package App\Models
 * @version February 26, 2020, 8:20 am CST
 *
 * @property string name
 * @property string decription
 */
class UsersStatu extends Model
{

    public $table = 'users_status';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name',
        'decription'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'decription' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    
}
