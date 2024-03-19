<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if(App::isProduction()){
            URL::forceScheme('https');

            // Ensure directories are writable by the web server
            if (!is_writable('/var/task/user/public/uploads')) {
                chmod('/var/task/user/public/uploads', 0755);
            }

            if (!is_writable('/var/task/user/public/db/database.sqlite')) {
                chmod('/var/task/user/public/db/database.sqlite', 0755);
            }
        }
    }
}
