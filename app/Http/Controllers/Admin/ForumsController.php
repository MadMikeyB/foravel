<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Theme;
use View;
use Storage;

use App\Http\Requests;
use App\Http\Controllers\Admin\Controller;
use App\Forum;

class ForumsController extends Controller 
{
	/**
     * Display Comment Listing
     *
     * @return \Illuminate\View\View
     */

    public function index()
    {
        $this->seo()->setTitle( 'Forum Manager &mdash; ' . $this->seo()->getTitle() );
        $forums = Forum::orderBy('position', 'asc')->paginate(10);
        return view('admin.forums.index', compact('forums'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        $this->seo()->setTitle( 'Create Forum &mdash; ' . $this->seo()->getTitle() );
        return view('admin.forums.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $forum = new Forum($request->all());
        $forum->save();
        return redirect('/forums' /*. $forum->slug*/);
    }

    public function edit(Forum $forum)
    {
        $this->seo()->setTitle( 'Forum '. $forum->name.' &mdash; ' . $this->seo()->getTitle() );
        return view('admin.forums.edit', compact('forum'));
    }


    public function update(Request $request, Forum $forum)
    {
        $forum->update($request->all());

        session()->flash('flash_message', 'Forum Updated!');

        return redirect('/admin/forums/' );
    }

    public function destroy(Forum $forum)
    {
        $forum->delete();

        session()->flash('flash_message', 'Forum Deleted!');

        return redirect('/admin/forums/' );
    }
}