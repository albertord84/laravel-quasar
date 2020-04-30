<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Questions
 * @package App\Models
 * @version April 30, 2020, 5:12 pm CDT
 *
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
        'type_id' => 'required',
        'response_type_id' => 'required',
        'question' => 'required'
    ];

    
}
