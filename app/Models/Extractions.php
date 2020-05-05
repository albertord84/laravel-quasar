<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Extractions
 * @package App\Models
 * @version May 5, 2020, 5:32 pm CDT
 *
 * @property integer status_id
 * @property integer user_id
 * @property number requested_value
 * @property number payed_value
 */
class Extractions extends Model
{
    use SoftDeletes;

    public $table = 'extractions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'status_id',
        'user_id',
        'requested_value',
        'payed_value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status_id' => 'integer',
        'user_id' => 'integer',
        'requested_value' => 'float',
        'payed_value' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'status_id' => 'required',
        'user_id' => 'required',
        'requested_value' => 'required'
    ];

    
}
