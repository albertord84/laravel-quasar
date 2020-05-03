<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Bases
 * @package App\Models
 * @version May 1, 2020, 7:55 pm CDT
 *
 * @property integer origin_id
 * @property integer company_id
 * @property integer criator_id
 * @property string name
 * @property string decription
 * @property string json_data
 */
class Bases extends Model
{
    use SoftDeletes;

    public $table = 'bases';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'origin_id',
        'company_id',
        'criator_id',
        'name',
        'decription',
        'json_data'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'origin_id' => 'integer',
        'company_id' => 'integer',
        'criator_id' => 'integer',
        'name' => 'string',
        'decription' => 'string',
        'json_data' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'origin_id' => 'required',
        'company_id' => 'required',
        'criator_id' => 'required',
        'name' => 'required'
    ];

    
}
