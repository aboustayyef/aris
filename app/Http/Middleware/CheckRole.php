<?php

namespace Aris\Http\Middleware;

use Closure;
use Aris\Node;
use \Session;
use \Redirect;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    
        // This is used for pages protected for different "roles", ie Parent, Student or Staff

        $node = (New Node)->getByPath($request->path());
        if ($node) {
            // Check if Node has a role
            if ($node->role) {
                if (Session::has('aris_role')) {
                    if (Session::get('aris_role')->shortname == $node->role) {
                        return $next($request);
                    } 
                }
            } else {
                // Node doesn't have roles
                return $next($request);
            }

            // page has role that requires login
            return Redirect::to('/rolelogin/create?role=' . $node->role . '&return=' . urlencode($request->path()));
        } else { // node not found. let the controller handle the 404.
            return $next($request);
        }

    }
}
