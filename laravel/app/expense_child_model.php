<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class expense_child_model extends Model
{
     protected $table='expense_child';
    protected $primaryKey='expense_id';
    protected $fillable=['purpose','amount','allocate_amount','party_name','expense_id'];

  
}
