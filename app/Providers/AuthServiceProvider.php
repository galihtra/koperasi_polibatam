<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        Gate::define('admin', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('bendahara', function (User $user) {
            return $user->is_bendahara;
        });

        Gate::define('pengawas', function (User $user) {
            return $user->is_pengawas;
        });

        Gate::define('kepalaBagian', function (User $user) {
            return $user->is_kabag;
        });

        Gate::define('sdm', function (User $user) {
            return $user->is_sdm;
        });
    }
}
