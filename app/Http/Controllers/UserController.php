<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Posts;

class UserController extends Controller
{
    public function profile(){
        return view('Profile', array('user' => Auth::user() ));
    }
   
    public function edit($id){
       $user = Auth::user()->toArray();
        return view('edit', compact('user', 'id'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Profile', array('user' => Auth::user() ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request = app('request');
        $this->validate($request, [
            'photo'  =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($request->hasFile('photo')) {
            $request->file('photo');
            $photo = $request->file('photo');
        $new_name = rand() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path("images"), $new_name);
        }else{
            return 'No files found';
        }
    /**
     * Validate request/input 
     **/
        $user = Auth::user();
    $this->validate($request, [
        'user_name' => 'required|string|max:255|unique:users',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);
        $user->user_name = $request->get('user_name');
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->photo = $new_name;
        $user->password = $request->get('password');
        $user->save();
    return redirect()->route('home')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$user = Auth::user();
        //$user->delete();
        $user = User::find($id);
        $user->delete();
        //DB::table('users')->where('id', '=', $id)->delete();
        $posts = Posts::where('owner_id', $id)->get();
        foreach ($posts as $post){
            $post->delete();
        }
        return redirect()->route('home')->with('success', 'Data Deleted');
    }
}
