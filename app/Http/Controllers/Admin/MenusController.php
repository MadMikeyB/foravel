<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Theme;
use View;
use Storage;

use App\Http\Requests;
use App\Http\Controllers\Admin\Controller;
use App\Menu;

class MenusController extends Controller 
{

	/**
     * Display Menu Listing
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->seo()->setTitle( 'Menu Manager &mdash; ' . $this->seo()->getTitle() );

    	return view('admin.menu.index');
    }

    /**
     * Store the Menu Item
     *
     * @param \Illuminate\Http\Request    $request
     * @return Response
     */
    public function store(Request $request)
    {
        $menu = new Menu($request->all());
        $menu->save();

        session()->flash('flash_message', 'Menu Item Added!');

        return back();
    }

    public function edit(Menu $menu)
    {
        $this->seo()->setTitle( 'Edit Menu Item: '. $menu->title.' &mdash; ' . $this->seo()->getTitle() );
        return view('admin.menu.edit', compact('menu'));
    }


    public function update(Request $request, Menu $menu)
    {
        $menu->update($request->all());

        session()->flash('flash_message', 'Menu Item Updated!');

        return redirect('/admin/menus/' );
    }
}