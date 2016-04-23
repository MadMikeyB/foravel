<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Menu extends Model
{
	protected $fillable = ['title', 'url', 'position', 'group', 'icon'];
	
	public static function generateMenu()
	{
		$menu	= DB::table('menus')->orderBy('position')->get();
		
		if ( $menu )
		{
			return $menu;
		}
		else
		{
			$menu =  [
				'id'		=> '1',
				'title'		=> 'Home (No Menus set up)',
				'url'		=> '#',
				'position'	=> '1',
				'group'		=> '3',
				'icon'		=> 'fa-home',
			];
			self::create($menu);
		}
	}
}
