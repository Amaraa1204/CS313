<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
class ItemController extends Controller
{
    public function showList($type){
    	$posts=Posts::where('type', $type)->get();
    	return view('shoes', compact('posts'));
    }
}
