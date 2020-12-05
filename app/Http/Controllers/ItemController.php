<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\user;
use App\Item;
class ItemController extends Controller
{
    public function search(){
        $search = $_POST['search'];
        $posts = Posts::whereRaw('LOWER(name) like (?)', strtolower($search))->get();
        #'column', 'ilike', '%' . $value . '%'
        #"UPPER('{$column}') LIKE '%'". strtoupper($value)."'%'"
        #echo $search;
        return view('/search')->with('posts', $posts);
    }
}
