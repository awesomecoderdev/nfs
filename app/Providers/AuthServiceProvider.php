<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // wids 439, 440, 441,442,443,444

        Gate::define('isAdmin', fn (User $user) => $user->isAdmin);
        Gate::define('wid439', fn (User $user) => $user->wid === 439);
        Gate::define('wid440', fn (User $user) => $user->wid === 440);
        Gate::define('wid441', fn (User $user) => $user->wid === 441);
        Gate::define('wid442', fn (User $user) => $user->wid === 442);
        Gate::define('wid443', fn (User $user) => $user->wid === 443);
        Gate::define('wid444', fn (User $user) => $user->wid === 444);
    }
}
