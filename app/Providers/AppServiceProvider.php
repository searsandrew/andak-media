<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Auth, Carbon;

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
        Carbon::macro('greet', function () {
            $user = strtok(Auth::user()->name, " ");
            $hour = $this->format('H');
            if ($hour < 12) {
                return 'Good Morning, ' . $user;
            }
            if ($hour < 17) {
                return 'Good Afternoon, ' . $user;
            }
            return 'Good Evening, ' . $user;
        });
    }
}
