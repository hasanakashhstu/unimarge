<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MetaData extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'meta_type',
        'meta_key',
        'title',
        'meta_value',
        'sort_order',
        'status',
    ];

    public function getStatus()
    {
        return $this->status == 1 ? 'Active' : 'Deactivate';
    }
}
