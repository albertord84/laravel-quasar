<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Planes
 * @package App\Models
 * @version April 30, 2020, 5:04 pm CDT
 *
 * @property string name
 * @property number price
 * @property number recompense
 * @property string description
 * @property integer has_boolean_selection
 * @property integer has_unique_selection
 * @property integer has_multiple_selection
 * @property integer has_scale_response
 * @property integer has_discursive_response
 * @property integer has_image_content
 * @property integer has_video_content
 * @property integer has_link_content
 */
class Planes extends Model
{
    use SoftDeletes;

    public $table = 'planes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'price',
        'recompense',
        'description',
        'has_boolean_selection',
        'has_unique_selection',
        'has_multiple_selection',
        'has_scale_response',
        'has_discursive_response',
        'has_image_content',
        'has_video_content',
        'has_link_content'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'price' => 'float',
        'recompense' => 'float',
        'description' => 'string',
        'has_boolean_selection' => 'integer',
        'has_unique_selection' => 'integer',
        'has_multiple_selection' => 'integer',
        'has_scale_response' => 'integer',
        'has_discursive_response' => 'integer',
        'has_image_content' => 'integer',
        'has_video_content' => 'integer',
        'has_link_content' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'price' => 'required',
        'recompense' => 'required',
        'has_boolean_selection' => 'required',
        'has_unique_selection' => 'required',
        'has_multiple_selection' => 'required',
        'has_scale_response' => 'required',
        'has_discursive_response' => 'required',
        'has_image_content' => 'required',
        'has_video_content' => 'required',
        'has_link_content' => 'required'
    ];

    
}
