<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Reaction;

class ReactionsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$user_id 	= $request->input('user_id');
    	$post_id	 = $request->input('post_id');
    	
    	$reaction = Reaction::where(['user_id' => $user_id, 'post_id' => $post_id])->first();
    	if ( ! $reaction )
    	{
        	$reaction = new Reaction($request->all());
        	$reaction->save();
        	echo json_encode($reaction);
	        // Event::fire( new ReactionCreated() );
        }
        else 
        {
        	echo json_encode('err');
        }

    }

}
