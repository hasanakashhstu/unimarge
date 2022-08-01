<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class invoice_model extends Model
{
    protected $table='invoice';
    protected $primaryKey='invoice_id';
    protected $fillable=['medium','class_name','department','student_roll','title','waber','waber_purpose','Payment','from_date','to_date','invoice_creator','on_net_total','cash_status','form_name'];
    public function invoice_child(){
      return $this->hasMany(invoice_child_model::class, 'invoice_id');
    }
}
