<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CostsCenters
 * @package App\Models
 * @version May 1, 2020, 7:56 pm CDT
 *
 * @property integer company_id
 * @property integer admin_id
 * @property string name
 */
class CostsCenters extends Model
{
    use SoftDeletes;

    public $table = 'costs_centers';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'company_id',
        'admin_id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'integer',
        'admin_id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'company_id' => 'required',
        'admin_id' => 'required',
        'name' => 'required'
    ];

    
}
