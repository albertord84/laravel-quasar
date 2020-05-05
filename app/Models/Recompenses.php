<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Recompenses
 * @package App\Models
 * @version May 5, 2020, 5:33 pm CDT
 *
 * @property integer user_id
 * @property integer questionnaire_id
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
        'questionnaire_id',
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
        'questionnaire_id' => 'integer',
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
        'questionnaire_id' => 'required',
        'campaign_id' => 'required',
        'value' => 'required'
    ];

    
}
