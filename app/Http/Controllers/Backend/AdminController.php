<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\AdminTable as Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use Session;
use Illuminate\Contracts\Validation\Validator;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin', 'is_admin'])->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $mAdmin     = new Admin();
        $oListAdmin  = $mAdmin->getAll();
        return view('backend.admin.index',[
            'object'=>$oListAdmin,
            'title'=>'Danh sách Amdin'
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $title = "Thêm quản trị viên";
        return view('backend.admin.create',[
            'title'=>$title,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:admin',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);
        $data['name']       = $request->input('name');
        $data['email']      = $request->input('email');
        $data['password']   = bcrypt($request->input('password'));
        $mAdmin  =  new Admin() ;
        $mAdmin->store($data);

        return redirect()->route('admin')
            ->with('flash_message',
                'User successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin  =  Admin::findOrFail($id);


        return view('backend.admin.detail', [
            'object'=>$admin,

            'title'=>'Thông tin quản trị viên' ,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $admin  =  Admin::findOrFail($id);

        return view('backend.admin.edit',[
            'user'=>$admin,


            'title'=>'Cập nhât thông tin quản trị viên'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mAdmin     = new  Admin() ;
        $admin       = $mAdmin->findOrFail($id);
        $this->validate($request ,[
            'name'=>'required',
            'email'=>'required|email|unique:admin,email,'.$id.',id',
        ],[
            'name.required'     => "Vui lòng nhập tên !",
            'email.required'    => "Vui lòng nhập email !",
        ]);
        $param              = $request->only(['name', 'email']);

        if(!empty($request->input('password'))){

            $this->validate($request ,[
                'password'      => 'confirmed',
            ],[
                'password.required' => "Mật khẩu bắt buộc !"
            ]);
            $param['password']  = bcrypt($request->input('password'));
        }


        $admin->fill($param)->save();

        return redirect()->route('admin')
            ->with('flash_message',
                'User successfully edited.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
