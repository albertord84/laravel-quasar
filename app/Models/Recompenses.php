<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Recompenses
 * @package App\Models
 * @version April 30, 2020, 5:34 pm CDT
 *
 * @property integer user_id
 * @property integer question_id
 * @property integer campaign_id
 * @property number value
 */
class Recompenses extends Model
{
    use SoftDeletes;

    public $table = 'recompenses';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'question_id',
        'campaign_id',
        'value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'question_id' => 'integer',
        'campaign_id' => 'integer',
        'value' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'question_id' => 'required',
        'campaign_id' => 'required',
        'value' => 'required'
    ];

    
}
