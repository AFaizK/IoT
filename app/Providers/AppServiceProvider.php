<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        paginator::useBootstrap();
        Gate::define('is_admin', function(User $user)
        {
            return $user->role == '1';
        });
        Gate::define('user', function(User $user)
        {
            return $user->role == '0';
        });
     
        
    }
}
