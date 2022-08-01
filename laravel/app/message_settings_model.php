<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message_settings_model extends Model
{
    protected $table='sms';
    protected $primaryKey='id';
    protected $fillable=['info',
                        'name','mask','option'
                         ];
}
