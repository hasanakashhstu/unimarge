<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmissionSetupModel extends Model {

    protected $table = 'admission_setup';
    protected $primaryKey = 'admission_setup_id';
    protected $fillable = ['department_id', 'session', 'year', 'application_deadline', 'date_of_admission_test', 'status'];

    public function validation() {
        return [
            'program_type' => 'required',
            'department_id' => 'required',
            'session' => 'required',
            'year' => 'required',
            'application_deadline' => 'required',
            'date_of_admission_test' => 'required',
            'status' => 'required',
        ];
    }

}
