<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'experience';

    // Award XP
    public function add( $points )
    {
    	$this->increment('points', $points);

    	return $this;
    }

    // Remove XP
	public function remove( $points )
    {
    	$this->decrement('points', $points);

    	return $this;
    }
}
