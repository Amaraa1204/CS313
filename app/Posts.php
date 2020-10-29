<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
    	'owner_name', 'name', 'type', 'time', 'price', 'description', 'photo', 'owner_type'
    ];
    public $timestamps = false;
}
