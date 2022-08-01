<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salary_slips_deducationcomponent extends Model
{
    protected $table='salary_slips_deducationcomponent';
    protected $primaryKey='id';
    protected $fillable=['selip_id','name','form_date','base','Variable'];
}
