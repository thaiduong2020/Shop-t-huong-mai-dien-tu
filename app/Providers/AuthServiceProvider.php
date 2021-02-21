<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Categories;
use App\Models\Product;
use App\Policies\ProductPolicy;
use App\Policies\CategoryPolicy;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
        Categories::class => CategoryPolicy::class,
        Product::class => ProductPolicy::class,
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
            return $user->checkRole('Category');
        });
        Gate::define('product-list', function ($user) {
            return $user->checkRole('Product');
        });
        Gate::define('Create.product', function ($user) {
            return $user->checkRole('content');
        });
        Gate::define('comment-list', function ($user) {
            return $user->checkRole('comment');
        });
        Gate::define('bill-list', function ($user) {
            return $user->checkRole('bill');
        });
        Gate::define('roles-list', function ($user) {
            return $user->checkRole('roles');
        });
        Gate::define('user-list', function ($user) {
            return $user->checkRole('user');
        });
    }
}
