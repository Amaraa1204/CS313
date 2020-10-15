<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->toArray();
        return view('edit', compact('user'));
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
        $user = Auth::user();
        $this->validate($request, [
        'user_name' => 'required|string|max:255|unique:users'.$user->id,
        'first_name' => 'required|string|max:255'.$user->id,
        'last_name' => 'required|string|max:255'.$user->id,
        'email' => 'required|string|email|max:255|unique:users'.$user->id,
        'photo' => 'required'.$user->id,
        'sign_up_date' => date('Y-m-d H:i:s').$user->id,
        'password' => 'required|string|min:8|confirmed'.$user->id,
    ]);
        User::update([
            'user_name' => $_POST['user_name'],
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'email' => $_POST['email'],
            'photo' => $_POST['photo'],
            'password' => $_POST['password']
        ]);
        /*$user1 = User::find($user->id);
        $user1->user_name = $request->get('user_name');
        $user1->first_name = $request->get('first_name');
        $user1->last_name = $request->get('last_name');
        $user1->email = $request->get('email');
        $user1->photo = $request->get('photo');
        $user1->sign_up_date = $request->get('sign_up_date');
        $user1->password = $request->get('password');
        $user1->save();*/
    return back();
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
