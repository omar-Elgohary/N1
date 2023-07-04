<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;

class CheckRestaurent
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
        if(auth()->user()->department_id == 1){
            return $next($request);
        }else{
            session()->flash('CheckRestaurent');
            return redirect()->route('home');
        }    }
}
