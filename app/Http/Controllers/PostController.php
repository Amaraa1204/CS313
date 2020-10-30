<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Posts;
use App\user;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        /*
        
            $photo = $_GET['photo'];
        $new_name = rand() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path("images"), $new_name);
        
*/  
        return view('sell');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request = app('request');
        $this->validate($request, [
            'photo'  =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($request->hasFile('photo')) {
            $request->file('photo');
            $photo = $request->file('photo');
        $new_name = rand() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path("itemImages"), $new_name);
        #store('public/'.$new_name);
        #
        }else{
            return 'No files found';
        }

        $user = Auth::user();
        $type = $_POST['type'];
        if ($type == "dif") {
            $type = $_POST['addType'];
        }else{
            $type = $_POST['type'];
        }

        Posts::create([
            'owner_name' => $user->user_name,
            'name' => $_POST['name'],
            'type' => $type,
            'time' => $_POST['time'],
            'price' => $_POST['price'],
            'description' => $_POST['def'],
            'photo' => $new_name,
        ]);
        return view('home');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
