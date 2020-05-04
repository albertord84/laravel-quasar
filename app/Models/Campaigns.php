<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Campaigns
 * @package App\Models
 * @version May 1, 2020, 7:57 pm CDT
 *
 * @property integer status_id
 * @property integer criator_id
 * @property integer updater_id
 * @property integer questionary_id
 * @property integer base_id
 * @property string name
 * @property string objetive
 * @property string description
 * @property string observation
 * @property integer response_limit
 * @property integer response_amount
 * @property integer invitations_sent
 * @property integer invitations_accepted
 * @property integer invitations_declined
 * @property string|\Carbon\Carbon invitations_send_date
 * @property string|\Carbon\Carbon requested_date
 * @property string|\Carbon\Carbon analyzed_date
 * @property string|\Carbon\Carbon start_date
 * @property string|\Carbon\Carbon end_date
 */
class Campaigns extends Model
{
    use SoftDeletes;

    public $table = 'campaigns';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'status_id',
        'criator_id',
        'updater_id',
        'questionary_id',
        'base_id',
        'name',
        'objetive',
        'description',
        'observation',
        'response_limit',
        'response_amount',
        'invitations_sent',
        'invitations_accepted',
        'invitations_declined',
        'invitations_send_date',
        'requested_date',
        'analyzed_date',
        'start_date',
        'end_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status_id' => 'integer',
        'criator_id' => 'integer',
        'updater_id' => 'integer',
        'questionary_id' => 'integer',
        'base_id' => 'integer',
        'name' => 'string',
        'objetive' => 'string',
        'description' => 'string',
        'observation' => 'string',
        'response_limit' => 'integer',
        'response_amount' => 'integer',
        'invitations_sent' => 'integer',
        'invitations_accepted' => 'integer',
        'invitations_declined' => 'integer',
        'invitations_send_date' => 'datetime',
        'requested_date' => 'datetime',
        'analyzed_date' => 'datetime',
        'start_date' => 'datetime',
        'end_date' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'status_id' => 'required',
        'criator_id' => 'required',
        'questionary_id' => 'required',
        'name' => 'required',
        'response_limit' => 'required'
    ];

    
}
