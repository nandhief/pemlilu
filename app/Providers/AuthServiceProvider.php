<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

         /*
         * Auth gates for: User management
         */ 
        if ($user = \Auth::user()) {
            /*Gate::define('user_management_access', function ($user) {
                return in_array($user->role_id, [1]);
            });*/
            foreach (\App\Role::get() as $role) {
                $title = strtolower($role->title);
                Gate::define($title, function ($user) {
                    switch ($title) {
                        case 'administrator':
                            return in_array($user->roles()->id, [1, 2, 3, 4]);
                            break;
                        case 'pengawas':
                            return in_array($user->roles()->id, [2, 3, 4]);
                            break;
                        case 'antrian':
                            return in_array($user->roles()->id, [3]);
                            break;
                        case 'verifikasi':
                            return in_array($user->roles()->id, [4]);
                            break;
                    }
                });
            }
        }
    }
}
