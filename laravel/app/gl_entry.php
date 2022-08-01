<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gl_entry extends Model
{
    protected $table='gl_entry';
    protected $primaryKey='tran_id';
    protected $fillable=['transcation_type',
                        'tr_date',
                         'amount',
                         'status',
                         'party',
                         'account_name'];
    
    
    
}
