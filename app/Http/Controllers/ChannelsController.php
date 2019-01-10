<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use Session;
use Auth;
use App\Discussion;

class ChannelsController extends Controller
{

    public function __construct(){

        $this->middleware('admin');


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $channels = Channel::where('active',1)->get();

        
        return view('channels.index',['channels', $channels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('channels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
        ]);

        $channel = Channel::create([
          'title'=>$request->title,
          'slug'=>str_slug($request->title)
        ]);

        Session::flash('success','Channel created successfully.');

        return redirect()->route('channels.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $channel = Channel::find($id);

        return view('channels.show')->with('channel',$channel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $channel = Channel::find($id);

        return view('channels.edit')->with('channel',$channel);
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
        $channel = Channel::where('id',$id)->update(['title'=>$request->title]);
        Session::flash('success','Channel Updated successfully.');
        return redirect()->route('channels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $channel = Channel::where('id',$id)->delete();

        Session::flash('success','Channel successfully deleted');

        return redirect()->route('channels.index');
        
    }


    public function discussion($id){

        $discussions = Discussion::where('channel_id',$id)->orderBy('created_at','desc')->paginate(3);

       return view('channels.channel-discussion',['discussions'=>$discussions]);

    }
}
