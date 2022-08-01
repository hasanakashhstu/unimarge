<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class report_settings_model extends Model
{
    protected $table="report_settings";
    protected $primaryKey="report_settings_id";
    protected $fillable=['name','designation','report_settings_id'];

}
