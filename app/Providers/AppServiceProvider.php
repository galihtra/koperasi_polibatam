<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Pagination menggunakan bootstrap
        Paginator::useBootstrap();

        //
        Gate::define('admin', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('bendahara', function (User $user) {
            return $user->is_bendahara;
        });

        Gate::define('ketua', function (User $user) {
            return $user->is_ketua;
        });

        Gate::define('pengawas', function (User $user) {
            return $user->is_pengawas;
        });

        Blade::directive('currency', function ( $expression ) { return "Rp. <?php echo number_format($expression,0,',','.'); ?>"; });
    }
}
