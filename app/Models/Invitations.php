<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Invitations
 * @package App\Models
 * @version June 21, 2020, 9:34 am CDT
 *
 * @property \App\Models\Campaign campaign
 * @property \App\Models\User user
 * @property integer user_id
 * @property integer campaign_id
 */
class Invitations extends Model
{
    use SoftDeletes;

    public $table = 'invitations';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'campaign_id',
        'status_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'campaign_id' => 'integer',
        'status_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'campaign_id' => 'required',
        'status_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function campaign()
    {
        return $this->belongsTo(\App\Models\Campaign::class, 'campaign_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
