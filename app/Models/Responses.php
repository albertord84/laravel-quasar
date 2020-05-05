<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Responses
 * @package App\Models
 * @version May 5, 2020, 5:32 pm CDT
 *
 * @property integer user_id
 * @property integer question_id
 * @property integer campaign_id
 * @property integer response_option_id
 * @property string discursive_text
 */
class Responses extends Model
{
    use SoftDeletes;

    public $table = 'responses';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'question_id',
        'campaign_id',
        'response_option_id',
        'discursive_text'
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
        'response_option_id' => 'integer',
        'discursive_text' => 'string'
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
        'response_option_id' => 'required'
    ];

    
}
