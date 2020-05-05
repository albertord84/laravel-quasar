<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Address
 * @package App\Models
 * @version May 5, 2020, 5:25 pm CDT
 *
 * @property string cep
 * @property string street
 * @property string number
 * @property string complement
 * @property string district
 * @property string city
 * @property string uf
 */
class Address extends Model
{
    use SoftDeletes;

    public $table = 'address';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'cep',
        'street',
        'number',
        'complement',
        'district',
        'city',
        'uf'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cep' => 'string',
        'street' => 'string',
        'number' => 'string',
        'complement' => 'string',
        'district' => 'string',
        'city' => 'string',
        'uf' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cep' => 'required',
        'street' => 'required',
        'district' => 'required',
        'city' => 'required',
        'uf' => 'required'
    ];

    
}
