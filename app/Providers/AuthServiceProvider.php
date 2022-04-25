<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\RoleUser;

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

        Gate::define('isAdmin', function($user) {
            return RoleUser::where('user_id', $user->id)->pluck('role_id')->first() == 1;
        });
        Gate::define('isDoctor', function($user) {
            return RoleUser::where('user_id', $user->id)->pluck('role_id')->first() == 3;
        });
        Gate::define('isPatient', function($user) {
            return RoleUser::where('user_id', $user->id)->pluck('role_id')->first() == 4;
        });
    }
}
