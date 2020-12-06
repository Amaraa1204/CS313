<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
    	'owner_id', 'name', 'type', 'time', 'price', 'description', 'status', 'photo'
    ];
    public $timestamps = false;
}
