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

        Gate::define('category-list', function ($user) {
            return $user->checkRole('admin','Category',);
        });
        Gate::define('product-list', function ($user) {
            return $user->checkRole('admin','Product');
        });
        Gate::define('Create.product', function ($user) {
            return $user->checkRole('admin','content');
        });
    }
}
