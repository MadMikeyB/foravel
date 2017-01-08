<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        // Is Admin?
        $gate->before(function ($user, $ability) {
            if ($user->isAdmin()) {
                // Allow everything. Update, creation, deletion of everything.
                return true;
            }
        });
        
        // [20:14]  <lagbox> foreach ([... ability name ...] as $name) { $gate->define($name, function ($user, $resource) { ... }); } perhaps

        // Can Edit Post
        $gate->define('edit-post', function ($user, $post) {
            return $user->id === $post->user_id;
        });
        // Can Update Post?
        $gate->define('update-post', function ($user, $post) {
            return $user->id === $post->user_id;
        });
        // Can Delete Post
        $gate->define('delete-post', function ($user, $post) {
            return $user->id === $post->user_id;
        });
        // Can Delete Post
        $gate->define('report-post', function ($user, $post) {
            return true;
        });
        // Can Edit User
        $gate->define('edit-user', function ($user, $loggedInUser) {
            return $user->id === $loggedInUser->id;
        });
    }
}
