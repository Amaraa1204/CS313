<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Posts;
use App\user;
use App\Bid;
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
        $id = $user->id;

        $type = $_POST['type'];
        if ($type == "dif") {
            $type = $_POST['addType'];
        }else{
            $type = $_POST['type'];
        }

        Posts::create([
            'owner_id' => $id,
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
        //$post = Posts::where('id',$id)->first();
        return view('edit_post', compact('post', 'id'));
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
        $photo->move(public_path("itemImages"), $new_name);
        #store('public/'.$new_name);
        #
        }else{
            return 'No files found';
        }
    /**
     * Validate request/input 
     **/
    $user = Auth::user();
        $user_id = $user->id;

        $type = $_POST['type'];
        if ($type == "dif") {
            $type = $_POST['addType'];
        }else{
            $type = $_POST['type'];
        }

        Posts::update([
            'owner_id' => $user_id,
            'name' => $_POST['name'],
            'type' => $type,
            'time' => $_POST['time'],
            'price' => $_POST['price'],
            'description' => $_POST['def'],
            'photo' => $new_name,
        ]);

        /*$post->name = $request->get('name');
        $post->owner_id = $user_id;
        $post->type = $type;
        $post->time = $request->get('time');
        $post->price = $request->get('price');
        $post->description = $request->get('def');
        $post->photo = $new_name;
        $post->save();*/

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
        //
    }

    public function bid(Request $request, $post_id) {
        $user = Auth::user();
        $post = Posts::where('id', $post_id)->first();
        $amount = 0;
        switch($request->submitbutton) {

            case 'send': 
                $amount = $_POST['bid'];
            break;
        
            case 'message': 
                //action for save-draft here
            break;

            case 'buy': 
                $amount = $post->price;
            break;
        }

        Bid::create([
            'user_id' => $user->id,
            'post_id' => $post_id,
            'amount' => $amount,
            'state' => "unanswered",
        ]);

        return redirect()->route('home')->with('success', 'Bid sent');
    }

    public function bid_change(Request $request, $bid_id) {
        $bid = Bid::where('id', $bid_id)->first();
        $post = Posts::where('id', $bid->post_id)->first();
        switch($request->submitbutton) {

            case 'accept': 
                Bid::where('id', $bid_id)->first()->update(array('state'=>"accepted"));
                $bids = Bid::where('post_id', '=', $post->id)->where('id', '!=', $bid_id)->get();
                foreach($bids as $bid){
                    Bid::where('id', $bid->id)->first()->update(array('state'=>"unaccepted"));
                }
            break;
        
            case 'message': 
                //action for save-draft here
            break;
        }

        return redirect()->route('home')->with('success', 'Bid sent');
    }
}
