<?php

namespace App\Providers;

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

        Gate::define('isManager', function ($user) {
            return ($user->role == 1);
        });

        // Adminユーザー
        Gate::define('isAdmin', function ($user) {
            return ($user->role >0 && $user->role <= 3);
        });

        // 一般ユーザー
        Gate::define('isGeneral', function ($user) {
            return ($user->role > 0 && $user->role <= 5);
        });
    }
}
