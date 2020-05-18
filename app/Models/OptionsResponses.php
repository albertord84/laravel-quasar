<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OptionsResponses
 * @package App\Models
 * @version April 30, 2020, 6:42 pm CDT
 *
 * @property integer question_id
 * @property string response
 * @property integer truth
 */
class OptionsResponses extends Model
{
    use SoftDeletes;

    public $table = 'options_responses';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'question_id',
        'response',
        'truth'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'question_id' => 'integer',
        'response' => 'string',
        'truth' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'question_id' => 'required',
        'response' => 'required',
        'truth' => 'required'
    ];


}
