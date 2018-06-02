<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Menu;
use Dompdf\Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $_menu ;


    public function __construct()
    {
        $this->_menu = new Menu();
    }

    public function index(Request $request)
    {


        $oListMenu  =  $this->_menu->getAll();
        return view('backend.menu.index' , [
            '_object'=>$oListMenu,
            '_title'=>'Danh sách Danh mục',
            '_param'=>$request->only('page', 1)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



        return view('backend.menu.create', ['_title'=>'Danh sách danh mục']);
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
            'menu_name' => 'required',
        ]);
        $param     = $request->all();
        unset($param['_token']);
        $param['created_at']    = date('Y-m-d H:i:s');
        $param['slug']          = str_slug($request->input('menu_name'));
        if($this->_menu->store($param)){
            $request->session()->flash('message_success', 'Thêm dữ liệu thành công');
            return redirect()->route('menu');
        }
        $request->session()->flash('message_warning', 'Đã xãy ra lỗi');
        return redirect()->route('menu.create');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        $param  = $request->all();

        $data  = [
            'menu_status'=>($param['action'] == 'active') ? 0 : 1
        ];


        $this->_menu->updates($data, $param['id']);

        return $this->setResponse(true, null , array('messages'=>'Cập nhật dữ liệu thành công !'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $oMenu   =   $this->_menu->getItem($id) ;

       return view('backend.menu.edit', ['_object'=>$oMenu, '_title'=>'Cập nhật danh mục']);
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
         try{
             $param  = $request->all();
             unset($param['_token']);
             $param['slug']  = str_slug($request->input('menu_name'));
             if($this->_menu->updates($param, $id)){
                 $request->session()->flash('message_success', 'Cập nhật dữ liệu thành công');
                 return redirect()->route('menu');
             }
         }catch (\Exception $exception){
             $request->session()->flash('message_warning', 'Đã xãy ra lỗi');
         }
        return redirect()->route('menu.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            if($this->_menu->destroys($id)){
                return  $this->setResponse(true,null, ['messages'=>'Xóa dữ liệu thành công !']) ;
            }
        }catch(\Exception $exception){
           return $this->setResponse(false,null, ['messages'=>'Đã xảy ra lỗi']) ;
        }
        return $this->setResponse(false,null, ['messages'=>'Đã xảy ra lỗi']) ;
    }


}
