<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $fillable = [
    	'user_id', "post_id", 'amount', 'state'
    ];
    public $timestamps = false;
}
