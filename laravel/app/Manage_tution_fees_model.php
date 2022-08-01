<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manage_tution_fees_model extends Model
{
    protected $fillable = ['department_name', 'program_name', 'program_type', 'session', 'admission_fees', 'fee_per_credit', 'total_credit', 'total_credit_fee', 'discount', 'after_discount', 'total_semester', 'after_discount_total_fee', 'semester_fee'];
    protected $table = 'manage_tution_fees';
    protected $primaryKey = 'tution_fees_id';

    public function validation_rule()
    {
        return [
            'department_name' => 'required',
            'program_name' => 'required',
            'program_type' => 'required',
            'session' => 'required',
            'admission_fees' => 'required',
            'fee_per_credit' => 'required',
            'total_credit' => 'required',
            'total_credit_fee' => 'required',
            'discount' => 'required',
            'semester_fee' => 'required',
            'after_discount' => 'required',
            'total_semester' => 'required',
            'after_discount_total_fee' => 'required',

        ];
    }

    public function department()
    {
        return $this->belongsTo(manage_department_model::class, 'department_name');
    }

}
