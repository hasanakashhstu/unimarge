<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Administrative extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'administrative_office_id',
        'type',
        'teacher_id',
    ];

    public function office()
    {
        return $this->belongsTo(AdministrativeOffice::class, 'administrative_office_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function getType()
    {
        if ($this->type == 1) {
            $typeName = 'Head';
        } elseif ($this->type == 2) {
            $typeName = 'Sub Head';
        } elseif ($this->type == 3) {
            $typeName = 'Member';
        } else {
            $typeName = 'N/A';
        }

        return $typeName;
    }
}
