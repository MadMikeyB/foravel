<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Forum;
use App\Thread;
use App\Post;
use Auth;

class ThreadController extends Controller
{
    /**
     * Initialize Controller
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']);
    }
    
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
    public function create(Forum $forum)
    {
        return view('threads.create', compact('forum'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Forum $forum, Request $request)
    {
        $thread = $forum->threads()->create( [ 'title' => $request->title ] );
        $thread->user_id = Auth::user()->id;
        $thread->save();

        $post = $thread->posts()->create( ['content' => $request->content ] );
        $post->user_id = Auth::user()->id;
        $post->save();
                
        return redirect('/forums/' . $thread->forum->slug . '/' . $thread->slug );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum, Thread $thread)
    {
        return view('threads.show', compact('thread'));
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
