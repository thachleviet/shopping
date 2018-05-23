<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 08/05/2018
 * Time: 10:50 SA
 */

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Repositories\Backend\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user ;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->middleware('auth:admin');
        $this->user  = $userRepository;
    }

    public function indexAction(Request $request){
        $title = "Danh sách người dùng";
        $param  = $request->all();
        $object = $this->user->getListUser($param, true);
        return view('backend.user.index',['title'=>$title,'param'=>$param, 'object'=>$object]);
    }

    public function detailAction($id){
        $title  = "Thông tin chi tiết người dùng";
        $object = $this->user->getDetail($id);
        return view('backend.user.detail',['title'=>$title,'object'=>$object]);
    }

    public function changeStatusAction(Request $request){
       try{

           if($this->user->update(['confirmed'=>($request->confirmed == 'approved')? 'cancel' : 'approved'],$request->id)){
               return response()->json(['status'=>1,'confirmed'=>$request->confirmed, 'messages'=>'Cập nhập dữ liệu thành công']) ;
           }

       } catch (\Exception $exception){
           return response()->json(['status'=>0, 'messages'=>'Cập nhập dữ liệu thất bại']) ;
       }
    }
}