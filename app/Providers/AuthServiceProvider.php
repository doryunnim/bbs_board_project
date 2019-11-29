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
        
<<<<<<< HEAD
        // $this->registerPolicies();
=======
        $this->registerPolicies();
        
>>>>>>> f773e4ceb2ae734a12587f5b4fccd8893328f718
        Gate::define('update', function($user, $model){
            return $user->id === $model->user_id;
        });

        Gate::define('delete', function($user, $model){
            return $user->id === $model->user_id;
        });
    }
}
