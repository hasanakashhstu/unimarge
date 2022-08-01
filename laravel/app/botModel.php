<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class botModel extends Model
{
    protected $table = 'bot';
    protected $primaryKey = 'bot_id';
    protected $fillable = ['name', 'designation', 'email', 'address', 'image', 'facebook', 'twitter', 'instagram', 'pinterest'];

    public  function validation()
    {
        return [
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:5120',
            'email' => 'required',
            'address' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'pinterest' => 'required',
        ];
    }

    public  function validationEdit()
    {
        return [
            'name' => 'required',
            'designation' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'email' => 'required',
            'address' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'pinterest' => 'required',
        ];
    }
}
