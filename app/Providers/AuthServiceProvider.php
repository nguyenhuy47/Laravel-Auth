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
        $this->registerPolicies();

        Gate::define('view-page-admin',function ($user){
           if($user->admin == 1){
               return true;
           }else{
               return false;
           }
        });
        Gate::define('view-page-guest', function ($user){
            if($user->admin == 1 || $user->admin == 0){
                return true;
            }else{
                return false;
            }
        });
    }
}
