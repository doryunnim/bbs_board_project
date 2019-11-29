<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::before(function ($user){
            return $user->isAdmin();
        });
        
        $this->registerPolicies();
        
        Gate::define('update', function($user, $model){
            return $user->id === $model->user_id;
        });

        Gate::define('delete', function($user, $model){
            return $user->id === $model->user_id;
        });
    }
}
