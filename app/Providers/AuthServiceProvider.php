<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-posts', function($user){
           return $user->canCreatePosts();
        });

        Gate::define('edit-post', function ($user, Post $post){
            return $user->canEdit($post);
        });

        Gate::define('edit-comment', function ($user, Comment $comment){
            return $user->canEditComment($comment);
        });
    }
}
