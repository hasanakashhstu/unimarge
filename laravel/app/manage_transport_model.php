<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manage_transport_model extends Model
{

     protected $primaryKey='transport_id';
    protected $fillable=['route_name','name_of_transport','number_of_transport','licence_no','start_date','transport_color','number_of_seat','transport_id'];
    protected $table='manage_transport';

    public function validation_rule()
    {
    	return[
    		'route_name'=>'required',
    		'name_of_transport'=>'required',
    		'number_of_transport'=>'required',
    		'licence_no'=>'required',
    		'start_date'=>'required',
    		'transport_color'=>'required',
    		'number_of_seat'=>'required'

    	];
    }
}
    

// =======
//     protected $fillable = ['transport_id', 'route_name', 'name_of_transport','number_of_transport','licence_no','start_date','transport_color','number_of_seat'];
//     protected $table='manage_transport';
//     protected $primaryKey='transport_id';
//        public  function roles_rule(){

//         return [
//         'route_name' => 'required',
//         'name_of_transport' => 'required',
//         'number_of_transport' => 'required',
//         'licence_no' => 'required',
//         'start_date' => 'required',
//         'transport_color' => 'required',
//         'number_of_seat' => 'required',
//         ];
//     }
// }
// >>>>>>> 0d6b8e10e56496c7a04da50e84651fc614b03be1