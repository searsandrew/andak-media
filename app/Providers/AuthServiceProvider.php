<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Policies\NewsPolicy;
use App\Policies\ProductPolicy;

use Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('admin', function() { 
            return in_array(Auth::user()->id, explode(',', env('APP_ADMIN'))) ? TRUE : FALSE; 
        });
        Gate::define('author', [NewsPolicy::class, 'create']);
        Gate::define('order', [ProductPolicy::class, 'create']);
    }
}
