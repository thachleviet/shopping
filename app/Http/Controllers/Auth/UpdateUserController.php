<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 26/04/2018
 * Time: 1:12 CH
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\Frontend\UserTable as User;
use App\Models\Frontend\UserTable;
use App\Repositories\Frontend\Province\ProvinceRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdateUserController extends Controller
{

    protected $province;
    public function __construct(ProvinceRepositoryInterface $provinceRepository)
    {
        $this->middleware('web');
        $this->province = $provinceRepository;
    }

    public function updateAction(Request $request){

        if(! \Auth::check()){
            return redirect()->route('home') ;
        }
        // kiểm tra thông tin user
        $infoUser = User::find(\Auth::user()->id)->toArray();

        if($request->isMethod('post')){
//            $user = User::where('email', $request->input('email'))->orWhere('phone',$request->input('phone'))->first();

            $validate = Validator::make($request->all(),[
                'email' => 'required|unique:users,email,'.\Auth::user()->id.',id',
                'phone' => 'required|unique:users,phone,'.\Auth::user()->id.',id',
            ]);


            if($validate->fails()){
                return response()->json([
                        'status'=>false,
                        'messages'=> 'Email hoặc  Số điện thoại đã tồn tại '
                    ]
                );
            }
            $arrParams = array(
                'name'              => $request->input('name'),
                'email'             => $request->input('email'),
                'phone'             => $request->input('phone'),
                'birthday'          => $request->input('year').'-'.$request->input('month').'-'.(($request->input('day')>=10) ?$request->input('day') : '0'.$request->input('day')) ,
                'province_id'       => $request->input('province_id'),
                'district_id'       => $request->input('district_id'),
                'ward_id'           => $request->input('ward_id'),
                'address'           => $request->input('address'),
                'type'              => 'facebook',
                'gender'            => $request->input('gender'),
                'is_updated'        => 1,
            );

            $mUser  = new UserTable();

            $mUser->updateProfile($arrParams, $infoUser['id']);
            return response()->json([
                'status' => 1,
                'data'   => ['route' => 'home']
            ]);
        }
        return view('auth.update-info-user', [
            'object'=>$infoUser,
            'provinceOption'    => $this->province->getProvinceOption()
        ]);
    }
}