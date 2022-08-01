<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class create_admin_model extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name', 'date', 'phone', 'email', 'password', 'status', 'remember_token'];
    protected $hidden = [];
    protected $primaryKey = 'id';
    protected $table = 'users';


    public  function store_rules()
    {

        return [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',

        ];
    }
}
