<?php

namespace RB28DETT\Users\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use RB28DETT\Users\Models\User;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the current user can view users module.
     *
     * @param mixed $user
     *
     * @return bool
     */
    public function access($user)
    {
        $user = User::findOrFail($user->id);

        return $user->hasPermission('rb28dett::users.access') || $user->superAdmin();
    }

    /**
     * Determine if the current user can view users.
     *
     * @param mixed $user
     *
     * @return bool
     */
    public function view($user)
    {
        $user = User::findOrFail($user->id);

        return $user->hasPermission('rb28dett::users.view') || $user->superAdmin();
    }

    /**
     * Determine if the current user can create users.
     *
     * @param mixed $user
     *
     * @return bool
     */
    public function create($user)
    {
        $user = User::findOrFail($user->id);

        return $user->hasPermission('rb28dett::users.create') || $user->superAdmin();
    }

    /**
     * Determine if the current user can update users.
     *
     * @param mixed $user
     *
     * @return bool
     */
    public function update($user, User $userToManage)
    {
        if ($userToManage->id == $user->id || $userToManage->superAdmin()) {
            return false;
        }

        $user = User::findOrFail($user->id);

        return $user->hasPermission('rb28dett::users.update') || $user->superAdmin();
    }

    /**
     * Determine if the current user can update users.
     *
     * @param mixed $user
     *
     * @return bool
     */
    public function roles($user, User $userToManage)
    {
        if ($userToManage->id == $user->id || $userToManage->superAdmin()) {
            return false;
        }

        $user = User::findOrFail($user->id);

        return $user->hasPermission('rb28dett::users.roles') || $user->superAdmin();
    }

    /**
     * Determine if the current user can delete users.
     *
     * @param mixed $user
     *
     * @return bool
     */
    public function delete($user, User $userToManage)
    {
        if ($userToManage->id == $user->id || $userToManage->superAdmin()) {
            return false;
        }

        $user = User::findOrFail($user->id);

        return $user->hasPermission('rb28dett::users.delete') || $user->superAdmin();
    }
}
