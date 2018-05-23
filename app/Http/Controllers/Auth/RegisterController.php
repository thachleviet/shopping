<?php

namespace App\Http\Controllers\Auth;

use App\Models\Frontend\UserTable as User;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Province\ProvinceRepositoryInterface;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $province;
    public function __construct(ProvinceRepositoryInterface $provinceRepository)
    {
        $this->middleware('guest');
        $this->province  = $provinceRepository;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ],[
            'name.required'=>'Username  bắt buộc !',
            'name.max'=>'Độ dài tên người dùng dưới 255 ký tự !',
            'email.required'=>'Email  bắt buộc !',
            'email.email'=>'Email không hợp lệ !',
            'email.unique'=>'Email đã tồn tại',
            'max.email'=>'Email phải dưới 255 ký tự !',
            'phone.required'=>'Số điện thoại bắt buộc !',
            'phone.unique'=>'Số điện thoại đã tồn tại ',
            'password.required'=>'Mật khẩu bắt buộc !',
            'password.confirmed'=>'Xác thực mật khẩu không hợp lệ',
            'password.min'=>'Mật khẩu lớn hơn 6 ký tự !'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function showRegistrationForm()
    {

        return view('auth.register',[
            'provinceOption'    => $this->province->getProvinceOption()
        ]);
    }

    public function register(Request $request)
    {
        $validate = $this->validator($request->all());
        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'error'  => $validate->errors()
            ]);
        }

        event(new Registered($user = User::create([
            'name'              => $request->input('name'),
            'email'             => $request->input('email'),
            'password'          => bcrypt($request->input('password')),
            'confirmation_code' => $request->get('_token'),
            'phone'             => $request->input('phone'),
            'birthday'          => $request->input('year').'-'.$request->input('month').'-'.(($request->input('day')>=10) ?$request->input('day') : '0'.$request->input('day')) ,
            'province_id'       => $request->input('province_id'),
            'district_id'       => $request->input('district_id'),
            'ward_id'           => $request->input('ward_id'),
            'address'           => $request->input('address'),
            'type'              => 'account',
            'gender'            => $request->input('gender'),
        ])));

        Mail::send( 'auth.mail',['confirmation_code'=>$request->get('_token')], function($message) {
            $message->to(Input::get('email'), Input::get('name'))
                ->from('doanthihuynhnhu1996@gmail.com', 'Huỳnh Như')
                ->subject('Xác thực tài khoản');
        });

        return response()->json([
            'status' => 1,
            'data'  => ['route'=>'notification', 'messages'=> 'Đăng ký thành công vui lòng check Email để active Account']
        ]);
    }


    public function notification(){

        return view('auth.notification');
    }

    public function confirm($token , Request  $request){
        if(!$token){
            throw new App\Exceptions\InvalidConfirmationCodeException;
        }
        $user =  User::where('confirmation_code', '=', $token)->first();
        if(!$user){
            throw new App\Exceptions\InvalidConfirmationCodeException;
        }
        $user->confirmed = 'approved';
        $user->confirmation_code = null;
        $user->save();
        $request->session()->flash('flag_success' , 'Tài khoản '.$user->name.' đã được kích hoạt  bạn có thể truy cập hệ thông ngay lúc này') ;
        $this->guard()->login($user);
        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());

    }

}
