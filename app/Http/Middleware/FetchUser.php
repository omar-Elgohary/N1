<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FetchUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //
        $token = null;
        $_ = session()->get(env('JWT_KEY'));
        $auth = $request->header("Authorization");

        if($_ != null) $token = $_;
        if($auth && str_starts_with($auth, "Bearer ")) $token = substr($auth, 7);

        if($token != null) {
            try {
                $decoded = JWT::decode((string) $token, new Key(env("JWT_SECRET"), env("JWT_ALG")));
                if(property_exists($decoded, "type") && $decoded->type == "auth") {
                    $request["user"] = User::find($decoded->payload);
                }
            } catch (\Throwable $th) {}
        }

        return $next($request);
    }
}
