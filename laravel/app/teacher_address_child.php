<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class teacher_address_child extends Model
{
    use SoftDeletes;
    
    protected $table = 'teacher_address_child';
    protected $primaryKey = 'parent';
    protected $fillable = [
        'parent', 'post_office',
        'home_district',
        'division',
        'village_name',
        'home_name',
        'upazilas',
        'unions',
        'present_division',
        'present_home_district',
        'present_upazilas',
        'present_unions',
        'present_village_name',
        'present_post_office',
    ];
}
