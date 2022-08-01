<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salary_slips_EarningComponent extends Model
{
    protected $table='salary_slip_earningcomponent';
    protected $primaryKey='id';
    protected $fillable=['parent','name','form_date','base','Variable'];
}
