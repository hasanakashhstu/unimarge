<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salary_slip_model extends Model
{
    protected $table='salary_slip';
    protected $primaryKey='slip_id';
    protected $fillable=['slip_id',
                          'medium',
                         'type',
                          'person_id',
                          'person_name',
                          'payroll_frequency',
                          'posting_date',
                          'total_earning',
                          'total_deduction',
                          'gross_salary',
                          'payment_account',
                          'expense_account',
                          'round_of',
                          'salary_structure',
                          'month'];



    public function validation(){
        return[
              'type'=>'required',
              'medium'=>'required',
              'names'=>'required',
              'payroll_frequency'=>'required',
              'payment_account'=>'required',
              'expense_account'=>'required'];
    }
    
}
