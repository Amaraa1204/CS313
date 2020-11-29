<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
    	'owner_id', 'name', 'type', 'time', 'price', 'description', 'photo'
    ];
    public $timestamps = false;
}
