<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\user;
use App\Item;
class ItemController extends Controller
{
    public function showList($type){
    	$posts=Posts::where('type', $type)->get();
    	return view('shoes', compact('posts'));
    }

    public static function find_user($id){
        $name = user::where('id', $id);
        return $name;
    }
}
