<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('layouts.partials-backend.top-navbar', function ($view) {
            $activeUsersCount = DB::table('sessions')
                ->where('last_activity', '>=', now()->subMinutes(1)->timestamp)
                ->count();

            $view->with('activeUsersCount', $activeUsersCount);
        });
    }
}
