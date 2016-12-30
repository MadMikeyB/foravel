<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ForumPostCreated;


use App\Http\Requests;

use App\Forum;
use App\Thread;
use App\ForumPost;
use Auth;
use Event;


class ForumPostController extends Controller
{
    /**
     * Initialize Controller
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'store']);
        parent::__construct();
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
    public function store(Forum $forum, Thread $thread, Request $request)
    {
        $post = $thread->posts()->create( $request->all() );
        $post->user_id = Auth::user()->id;
        $post->save();

        Event::fire(new ForumPostCreated(Auth::user(), $post));
        
        return redirect('/forums/'. $forum->slug .'/'. $thread->slug .'/#post-'. $post->id  );
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
    public function edit(Forum $forum, Thread $thread, ForumPost $forumpost)
    {
        return view('forums.posts.edit', compact(['forum', 'thread', 'forumpost']));
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
