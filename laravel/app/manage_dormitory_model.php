<?php

namespace App;

// namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;

// use App\manage_department_model;

class manage_dormitory_model extends Model
{
    protected $table='manage_dormitory';
    protected $primaryKey='manage_dormitory_id';
    protected $fillable=['manage_dormitory_id','dormitory_title','dormitory_author','dormitory_no','dormitory_name','dormitory_floor','total_room_number','total_seat_number','dormitory_location','description'];
}

