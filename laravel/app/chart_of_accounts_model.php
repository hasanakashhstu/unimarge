<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chart_of_accounts_model extends Model
{
    protected $table='chart_of_accounts';
    protected $primaryKey='id';
    protected $fillable=['account_name',
                         'account_code',
                        'parent_account',
                         'transaction_amount',
                         'transaction_type',
                         ];


   public function validation()
    {
        return [
           'account_name'=>'required',
           'account_code'=>'required',
           'parent_account'=>'required',
            'transaction_amount'=>'required',
            'transaction_type'=>'required',

            
            
            
            
        ];
    } 
}
