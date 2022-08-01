<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class income_model extends Model
{
    protected $table='income';
    protected $primaryKey='id';
   
    protected $fillable=['id','roll','credit_fee','admission_fee','semester_fee','hall_seat_charge','miscellaneous','status','remark'];
}
