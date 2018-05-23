<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\Frontend\UserTable as User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
use Validator;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest',['except'=>['logout', 'userLogout']]);
    }

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request)
    {

        $facebook   = Socialite::driver('facebook')->user();

        $User  = User::where('facebook_id', $facebook->getId())->first();
        $request->session()->pull('customer_email');
        $request->session()->pull('customer_email');
        if($User) {
            \Auth::login($User, true) ;
            if(!$User['is_updated']){
                return redirect()->route('update-user');
            }
            return redirect($this->redirectTo);
        }else{
            $dataUser = [
                'facebook_id'      =>$facebook->getId(),
                'facebook_name'    =>$facebook->getName() ,
                'name'             =>$facebook->getName() ,
                'facebook_email'   =>$facebook->getEmail() ,
                'email'            =>$facebook->getEmail() ,
                'avatar'           =>$facebook->getAvatar(),
                'confirmed'        =>'approved',
            ];
            $User =  User::create($dataUser);
            \Auth::login($User, true) ;
            if(!$User['is_updated']){
                return redirect()->route('update-user');
            }
            return redirect($this->redirectTo);
        }

    }
    protected function attemptLogin(Request $request)
    {
        $user = User::where($this->username(), $request->input('email'))->first();

        if($user && ($user->confirmed == 'approved')){
            return $this->guard()->attempt(
                $this->credentials($request), $request->has('remember')
            );
        }

    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $user = User::where($this->username(), $request->input('email'))->first();

        if($user && ($user->confirmed == 'new')) {
            $errorMessage = 'Bạn cần kích hoạt tài khoản trước khi thực hiên đăng nhập hệ thống !'; // you can use trans here too
        }elseif($user && ($user->confirmed == 'cancel')){
            $errorMessage = 'Tài khoản của bạn đã bị khóa , bạn vui lòng liên hệ quản trị viên để kích hoạt lại tài khoản'; // you can use trans here too
        }
        else {
            $errorMessage = 'Tài khoản không tồn tại vui lòng đăng ký tài khoản ';
        }

        $errors = [$this->username() => $errorMessage];

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('home');
    }

}
