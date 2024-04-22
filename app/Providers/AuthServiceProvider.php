<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\DashboardController;
use App\Policies\DashboardPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        DashboardController::class => DashboardPolicy::class,
        \App\Models\User::class => \App\Policies\InnerPagePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    
    
        public function boot()
        {
            $this->registerPolicies();

        }
    
}
