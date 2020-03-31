<?php
/**
 * @copyright 2018 Manfred047
 * @author Emanuel Chablé Concepción <manfred@manfred047.com>
 * @version 1.0.0
 * @website: https://manfred047.com
 * @github https://github.com/Manfred047
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class InjectGrantClientDetails
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
        with(\Dotenv\Dotenv::create(base_path(),".env"))->load();

        Log::debug("Env PASSWORD_GRANT_CLIENT_ID: " , [env('PASSWORD_GRANT_CLIENT_ID')]);
        Log::debug("Env PASSWORD_GRANT_CLIENT_SECRET: " , [env('PASSWORD_GRANT_CLIENT_SECRET')]);

        $request->request->add([
            'client_id' => env('PASSWORD_GRANT_CLIENT_ID', '2'),
            'client_secret' => env('PASSWORD_GRANT_CLIENT_SECRET', '9vIud8YIkjQfqpeNkXL6cWR1g8IrmfPHUMqdEQNQ')
        ]);
        return $next($request);
    }
}
