<?php

namespace RB28DETT\Users;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use RB28DETT\Permissions\PermissionsChecker;
use RB28DETT\Users\Models\User;
use RB28DETT\Users\Policies\UserPolicy;

class UsersServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
    ];

    /**
     * The mandatory permissions for the module.
     *
     * @var array
     */
    protected $permissions = [
        [
            'name' => 'Users Access',
            'slug' => 'rb28dett::users.access',
            'desc' => 'Grants access to rb28dett/users module',
        ],
        [
            'name' => 'Create Users',
            'slug' => 'rb28dett::users.create',
            'desc' => 'Allows creating users',
        ],
        [
            'name' => 'Update Users',
            'slug' => 'rb28dett::users.update',
            'desc' => 'Allows updating users',
        ],
        [
            'name' => 'View Users',
            'slug' => 'rb28dett::users.view',
            'desc' => 'Allows previewing users',
        ],
        [
            'name' => 'Manage Users Roles',
            'slug' => 'rb28dett::users.roles',
            'desc' => 'Grants access to manage user roles',
        ],
        [
            'name' => 'Delete Users',
            'slug' => 'rb28dett::users.delete',
            'desc' => 'Allows delete users',
        ],
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->loadTranslationsFrom(__DIR__.'/Translations', 'rb28dett_users');

        $this->loadViewsFrom(__DIR__.'/Views', 'rb28dett_users');

        if (!$this->app->routesAreCached()) {
            require __DIR__.'/Routes/web.php';
        }

        // Make sure the permissions are OK
        PermissionsChecker::check($this->permissions);
    }

    /**
     * I cheated this comes from the AuthServiceProvider extended by the App\Providers\AuthServiceProvider.
     *
     * Register the application's policies.
     *
     * @return void
     */
    public function registerPolicies()
    {
        foreach ($this->policies as $key => $value) {
            Gate::policy($key, $value);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
