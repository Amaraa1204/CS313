<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
use App\Posts;
use App\Bid;

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
            'user_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
            'photo'  =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('photo')) {
            $request->file('photo');
            $photo = $request->file('photo');
        $new_name = date('d_m_y_h_i_s') . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path("images"), $new_name);
        }else{
            return 'No files found';
        }
        $user = Auth::user();
        /*$user->user_name = $request->get('user_name');
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->photo = $new_name;
        $user->password = Hash::make($data[$request->get('password')]);
        $user->save();*/
        $user->update([
            'user_name' => $request->get('user_name'),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request['password']),
            'photo' => $new_name
        ]);
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
        $bids = Bid::where('user_id', $id)->get();
        foreach ($bids as $bid){
            $bid->delete();
        }
        return redirect()->route('home')->with('success', 'Data Deleted');
    }
}
