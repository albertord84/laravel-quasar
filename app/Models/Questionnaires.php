<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Questionnaires
 * @package App\Models
 * @version April 30, 2020, 5:12 pm CDT
 *
 * @property integer plane_id
 * @property integer criator_id
 * @property integer updater_id
 * @property string name
 * @property string description
 * @property string observation
 * @property integer released
 */
class Questionnaires extends Model
{
    use SoftDeletes;

    public $table = 'questionnaires';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'plane_id',
        'criator_id',
        'updater_id',
        'name',
        'description',
        'observation',
        'released'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'plane_id' => 'integer',
        'criator_id' => 'integer',
        'updater_id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'observation' => 'string',
        'released' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'plane_id' => 'required',
        'criator_id' => 'required',
        'name' => 'required',
        'released' => 'required'
    ];

    
}
