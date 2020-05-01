<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Questions
 * @package App\Models
 * @version May 1, 2020, 12:29 pm CDT
 *
 * @property integer questionnaire_id
 * @property integer type_id
 * @property integer response_type_id
 * @property string question
 * @property string json_data
 */
class Questions extends Model
{
    use SoftDeletes;

    public $table = 'questions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'questionnaire_id',
        'type_id',
        'response_type_id',
        'question',
        'json_data'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'questionnaire_id' => 'integer',
        'type_id' => 'integer',
        'response_type_id' => 'integer',
        'question' => 'string',
        'json_data' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'questionnaire_id' => 'required',
        'type_id' => 'required',
        'response_type_id' => 'required',
        'question' => 'required'
    ];

    
}
