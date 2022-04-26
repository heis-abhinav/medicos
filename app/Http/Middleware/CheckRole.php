<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        // if(!$request->role()->hasRole($role)){
        //     abort(401, 'This action is unauthorized.');
        // }
        $roleid = Auth::check() ? Role::where('name', $role)->pluck('id') : '';
        $role_existence = RoleUser::where('role_id', $roleid)->where('user_id', Auth::id())->first();
        if(is_null($role_existence)):
            abort(401, 'This action is unauthorized.');
        endif;
        return $next($request);
    }
}
