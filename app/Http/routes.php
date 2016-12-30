<?php

// Are we installed?
if ( ! file_exists(storage_path('installed')) )
{    
    Route::get('/', function()
    {
        return redirect()->to('/install');
    });
} 
else
{

	// Admin
	Route::group(['middleware' => ['web', 'auth', 'menu', 'admin']], function() {

	    Route::get('admin', 'Admin\Controller@index');

	    Route::get('admin/posts', 'Admin\PostsController@index');
	    Route::get('admin/posts/create', 'Admin\PostsController@create');
	    Route::post('admin/posts', 'Admin\PostsController@store');

	    Route::get('admin/pages', 'Admin\PagesController@index');
	    Route::get('admin/pages/create', 'Admin\PagesController@create');
	    Route::post('admin/pages', 'Admin\PagesController@store');

	    Route::get('admin/comments', 'Admin\CommentsController@index');

	    Route::get('admin/users', 'Admin\UsersController@index');

	    Route::get('admin/menus', 'Admin\MenusController@index');
	    Route::post('admin/menus', 'Admin\MenusController@store');

	    Route::get('admin/settings', 'Admin\SettingsController@index');
	    Route::post('admin/settings', 'Admin\SettingsController@store');

	    Route::get('admin/editor', 'Admin\ThemesController@index');
	    Route::get('admin/editor/{theme?}', 'Admin\ThemesController@index');
	    Route::get('admin/editor/edit/{path?}', 'Admin\ThemesController@view')->where('path', '(.*)');

	    Route::get('admin/plugins', 'Admin\PluginsController@index');

	    Route::get('forums/create', ['as' => 'create_forum', 'uses' => 'ForumController@create']);

	    Route::get('admin/forums', 'Admin\ForumsController@index');
	    Route::post('admin/forums', 'Admin\ForumsController@store');
	    Route::get('admin/forums/create', 'Admin\ForumsController@create');
	    Route::get('admin/forums/edit/{forum}', 'Admin\ForumsController@edit');
	    Route::patch('admin/forums/edit/{forum}', 'Admin\ForumsController@update');
	    Route::delete('admin/forums/delete/{forum}', 'Admin\ForumsController@destroy');

	});

	// Auth
	Route::group(['middleware' => ['web', 'menu']], function () {
	    // Home
	        $home = Setting::get('home_page', 'default');

	        if ( $home === 'default') 
	        {
	            Route::get('', ['as' => 'home', 'uses' => 'HomeController@index']);
	        }
	        elseif ( $home === 'forums' )
	        {
	            Route::get('', ['as' => 'home', 'uses' => 'ForumController@index']);

	        }
	        else
	        {
	            Route::get('', function()
	            {
	                \Theme::init( Setting::get('theme_name') );   
	                $page = App\Page::where( 'slug', '=', Setting::get('home_page') )->first();
	                Event::fire(new App\Events\PageWasViewed($page));

	                $page->content = Markdown::convertToHtml($page->content);
	                return view('pages.show', compact('page'));
	            });
	        }

	    	Route::get('home', function(){
	    		return redirect()->action('HomeController@index');
	    	});
	        
	        Route::get('dashboard', 'DashboardController@index');
		
	    // Auth
	        Route::auth();
	    // Social Auth
	        Route::get('social/{provider?}', 'Auth\AuthController@redirectToProvider');
	        Route::get('social/{provider?}/callback', 'Auth\AuthController@handleProviderCallback');

	    // Profiles
	        // Show Profile
	        Route::get('@{user}', ['as' => 'show_profile', 'uses' => 'ProfileController@show']);
	        // Edit Profile
	        Route::get('@{user}/edit', ['as' => 'edit_profile', 'uses' => 'ProfileController@edit']);
	        // Update Profile
	        Route::patch('@{user}', 'ProfileController@update');
	        // Deactivate Profile
	        Route::get('@{user}/deactivate', 'ProfileContoller@deactivate');
	        // Delete Profile
	        Route::delete('@{user}/delete', 'ProfileController@destroy');

	    // Forums
	        // Forum Index
	        Route::get('forums', ['as' => 'forums', 'uses' => 'ForumController@index']);
	        // Create Thread
	        Route::get('forums/{forums}', ['as' => 'show_forum', 'uses' => 'ForumController@show']);
	        Route::get('forums/{forums}/create', ['as' => 'create_thread', 'uses' => 'ThreadController@create']);
	        // Show Thread
	        Route::get('forums/{forums}/{threads}', ['as' => 'show_thread', 'uses' => 'ThreadController@show']);
	        // Edit Post
	        Route::get('forums/{forums}/{threads}/replies/{forumpost}/edit', ['as' => 'edit_forum_post', 'uses' => 'ForumPostController@edit']);

	        // Store Forum
	        Route::post('forums', ['as' => 'store_forum', 'uses' => 'ForumController@store']);
	        // Store Thread
	        Route::post('forums/{forums}/{threads}', 'ForumPostController@store');
	        // Store Post
	        Route::post('forums/{forums}', 'ThreadController@store');
	});



	Route::group(['middleware' => ['web', 'menu']], function()
	{
	    // View Page
	    Route::get('{page?}', 'PagesController@show');
	});

}