<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;
use App\Models\Seguridad\Usuario;
use Illuminate\Http\Request;
use Closure;

class ResetPassword extends Middleware {

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
        $user = Usuario::findOrFail(auth()->id());
        if ($user["reset_pass"] == true) {            
            return redirect("RestablecerPassword");
        }
        return $next($request);
    }
 

}
