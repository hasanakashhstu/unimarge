<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salary_slips_DeducationComponent extends Model
{
    protected $table='salary_slip_deducationcomponent';
    protected $primaryKey='id';
    protected $fillable=['parent','name','form_date','base','Variable'];
}
