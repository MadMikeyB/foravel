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

    Route::get('admin', 'AdminController@index');
    Route::get('admin/posts', 'AdminController@posts');
    Route::get('admin/pages', 'AdminController@pages');
    Route::get('admin/comments', 'AdminController@comments');
    Route::get('admin/users', 'AdminController@users');
    Route::get('admin/settings', 'AdminController@settings');
    Route::post('admin/settings', 'AdminController@storeSettings');

    Route::get('admin/editor', 'AdminController@editor');
    Route::get('admin/editor/{theme?}', 'AdminController@editor');
    Route::get('admin/editor/edit/{path?}', 'AdminController@editFile')->where('path', '(.*)');

    Route::get('admin/tools', 'AdminController@tools');
    Route::get('admin/menus', 'AdminController@menus');
    Route::get('admin/menus/edit/{menu}', 'AdminController@editMenu');

    Route::post('admin/menus', 'AdminController@storeMenu');
    Route::patch('admin/menus/edit/{menu}', 'AdminController@updateMenu');
    Route::delete('admin/menus/delete/{menu}', 'AdminController@destroyMenu');

    Route::get('posts/create', ['as' => 'create_post', 'uses' => 'PostsController@create']);
    Route::post('posts', 'PostsController@store');

    Route::get('pages/create', 'AdminController@createPage');
    Route::post('pages', 'AdminController@storePage');

    Route::get('forums/create', ['as' => 'create_forum', 'uses' => 'ForumController@create']);

});

// Auth
Route::group(['middleware' => ['web', 'menu']], function () {
    // Home
        $home = Setting::get('home_page', 'default');

        if ( $home === 'default') 
        {
            Route::get('', ['as' => 'home', 'uses' => 'HomeController@index']);
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

    // Posts 
        Route::get('posts', ['as' => 'all_posts', 'uses' => 'PostsController@index']);
        
        // Edit Post
        Route::get('posts/{post}/edit', ['as' => 'edit_post', 'uses' => 'PostsController@edit']);
        
        // Add Images to Post
        Route::post('posts/{post}/images', 'PostsController@storeImage');

        // Update Post
        Route::patch('posts/{post}', 'PostsController@update');

        // Get Post
        Route::get('read/{post}', ['as' => 'show_post', 'uses' => 'PostsController@show']);

        // Delete Post
        Route::delete('posts/{post}/delete', 'PostsController@destroy');

    // Comments
        // Store Comment
        Route::post('posts/{post}/comments', 'CommentsController@store');

        Route::get('posts/{post}', function()
        {
            return redirect()->action('PostsController@show');
        });

        // Edit Comment
        Route::get('comments/{comment}/edit', 'CommentsController@edit');

        // Update Comment
        Route::patch('comments/{comment}', 'CommentsController@update');

        // Delete Comment
        Route::delete('comments/{comment}/delete', 'CommentsController@destroy');

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

// @todo redirects from MPress 1.x to MPress 2.x
