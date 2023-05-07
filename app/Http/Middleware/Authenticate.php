<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {

        if (!$request->expectsJson()) {
            //? Info: si el nombre de la ruta empieza con panel hara el redirect
            if(preg_match("/\bpanel\b/", $request->route()->getName())){
                return route('panel.access');
            }else{
                return route('login'); //Debes verificar que esta ruta exista!
            }
        }

        return null;
        // return $request->expectsJson() ? null : route('login');
    }
}
