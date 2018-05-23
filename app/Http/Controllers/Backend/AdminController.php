<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\AdminTable as Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
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
        $roles = Role::get();

        $title = "Thêm quản trị viên";
        return view('backend.admin.create',[
            'title'=>$title,
            'roles'=>$roles
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
            'email'=>'required|email|unique:admins',
            'phone'=>'required|unique:admins',
            'gender'=>'required'
        ]);
        $data['name']       = $request->input('name');
        $data['email']      = $request->input('email');
        $data['phone']      = $request->input('phone');
        $data['gender']     = $request->input('gender');
        $mAdmin  =  new Admin() ;
        $admin = $mAdmin->store($data);

        $roles = $request['roles'];
        if (isset($roles)) {

            foreach ($roles as $role) {
                $role_r = Role::where('id', '=', $role)->firstOrFail();
                $admin->assignRole($role_r);
            }
        }
        return redirect()->route('backend.admin.index')
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

        $roles = $admin->roles->pluck('name','id');

        return view('backend.admin.detail', [
            'object'=>$admin,
            'roles'=>$roles,
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
//        if(Auth::user()->id != $id || (!Auth::user()->is_admin)){
//            Session::flash('warning',"Bạn không có quyền truy cập chức năng này");
//            return redirect()->route('admin-admin');
//        }
        $admin  =  Admin::findOrFail($id);
        $roles = $admin->roles->pluck('name','id');
        return view('backend.admin.edit',[
            'user'=>$admin,
            'roles'=>Role::get(),
             'checkRole'=>$roles,
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
            'email'=>'required|email|unique:admins,email,'.$id.',id',
            'phone'=>'required|unique:admins,phone,'.$id.',id'
        ]);

        $param          = $request->only(['name', 'email', 'phone']);
        $roles          = $request->roles;

        $admin->fill($param)->save();


        if (isset($roles)) {
            $admin->roles()->sync($roles);
        }
        else {
            $admin->roles()->detach();
        }

        return redirect()->route('admin-admin')
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
