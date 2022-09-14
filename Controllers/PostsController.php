<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all();
        $posts = Post::orderBy('id', 'asc')->get();
        //$post = Post::where('roomName', 'King')->get();
        //paginate makes pages
        //use {{$posts->links()}} in html page
        //$posts = Post::orderBy('roomName', 'asc')->paginate(1);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'roomName' => 'required',
            'roomDesc' => 'required',
            'roomNumber' => 'required',
            'maxOccupancy' => 'required'
        ]);

        //create room
        $post = new Post;
        //used to get the input from the form and put it into the correct row
        $post->roomName = $request->input('roomName');
        $post->roomDesc = $request->input('roomDesc');
        $post->roomNumber = $request->input('roomNumber');
        $post->maxOccupancy = $request->input('maxOccupancy');

        $post->save();

        return redirect('/posts')->with('success', 'Room created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
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
        $this->validate($request, [
            'roomDesc' => 'required',
        ]);

        //create room
        $post = Post::find($id);
        //used to get the input from the form and put it into the correct row
        $post->roomDesc = $request->input('roomDesc');

        $post->save();

        return redirect('/posts')->with('success', 'Room Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/posts')->with('success', 'Room Deleted');
    }
}
