<?php

namespace App\Http\Middleware;

use App\Models\UserManagement\Role;
use App\Models\UserManagement\User;
use Closure;
use Illuminate\Support\Facades\Gate;

class AuthGates
{
    public function handle($request, Closure $next)
    {
        $user = \Auth::user();

        if (!app()->runningInConsole() && $user) {
            $roles            = Role::with('hasPermission')->get();
            $permissionsArray = [];

            foreach ($roles as $role) {
                foreach ($role->hasPermission as $permissions) {
                    $permissionsArray[$permissions->name][] = $role->id;
                }
            }

            foreach ($permissionsArray as $name => $roles) {
                Gate::define($name, function (User $user) use ($roles) {
                    return count(array_intersect($user->hasRole->pluck('id')->toArray(), $roles)) > 0;
                });
            }
        }

        return $next($request);
    }
}
