<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 18/05/2018
 * Time: 5:49 SA
 */

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Is_admin
{
    public function handle($request, Closure $next, $guard = null){

                if(Auth::guard('admin')->user()->is_admin){

                    return $next($request);
                }else{
                
                    Session::flash('warning', 'Ban không có quyền truy cập chức năng này');
                    return redirect()->route('admin-admin');
                }


    }
}