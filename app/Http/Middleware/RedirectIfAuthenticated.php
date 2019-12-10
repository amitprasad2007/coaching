<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard('faculty')->check()) {
               return  redirect()->route('pages');    
                  }elseif (Auth::guard('web')->check()) {
                    $roles=(auth()->user()->roles->pluck('name'));
            foreach ($roles as  $role) {
                switch ($role) {
                case 'Admin':
                        return  redirect()->route('dashboard');    
                    break;
                case 'Student':
                        return  redirect('student/dashboard'); 
                    break;
                     }   
          
  }

         }

        return $next($request);
    }
}
