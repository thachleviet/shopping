<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $slide;
    public function __construct()
    {
        $this->slide  = new Slide();
    }

    public function index(Request $request)
    {

        $mSlide      = new  Slide();
        $oListSlide  =  $mSlide->getAll();
        return view('backend.slide.index' , [
            '_object'=>$oListSlide,
            '_title'=>'Danh sách Slide',
            '_param'=>$request->only('page', 1)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slide.create',[
            '_title'=>'Danh sách slide'
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
        $this->validate($request,[
            'slider_image'             => 'required|mimes:jpeg,jpg,png',
        ],[
            'slider_image.required'        => 'Hình bắt buộc !',
            'slider_image.mimes'                 => 'Hình ảnh phải đúng định dạng jpeg,jpg,png'
        ]);
      $data = array(
          'slider_title'    =>$request->input('slider_title'),
          'slider_status'    =>$request->input('slider_status'),
          'slider_image'    =>'uploads/'.$this->uploadFiles($request,'slider_image','slider_image','uploads', null, null),
          'created_at'      => date('Y-m-d H:i:s'),
          'slider_name'     => $request->input('slider_name'),
          'slider_type'     => $request->input('slider_type')
      );

        if($this->slide->store($data)   ){
            $request->session()->flash('message_success', 'Thêm dữ liệu thành công');
            return redirect()->route('slide');
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
            'slider_status'=>($param['action'] == 'active') ? 0 : 1
        ];


        $this->slide->updates($data, $param['id']);

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
        $oSlide   =   $this->slide->getItem($id) ;

        return view('backend.slide.edit', ['_object'=>$oSlide, '_title'=>'Cập nhật danh mục']);
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
            $item  = $this->slide->getItem($id);
            $data['slider_title']   = $request->input('slider_title');
            $data['slider_status']  = $request->input('slider_status');
            $data['slider_name']    = $request->input('slider_name');
            $data['slider_type']    = $request->input('slider_type');
            if($request->hasFile('slider_image')){
                if(!empty($item['slider_image'])){
                    if(is_file(base_path().'/'.$item['slider_image'].'')){
                        unlink(base_path().'/'.$item['slider_image'].'');
                    }
                }
                $data['slider_image']= 'uploads/'.$this->uploadFiles($request,'slider_image','slider_image','uploads', null, null);
            }
            if($this->slide->updates($data, $id)){
                $request->session()->flash('message_success', 'Cập nhật dữ liệu thành công');
                return redirect()->route('slide');
            }
        }catch (\Exception $exception){
            $request->session()->flash('message_warning', 'Đã xãy ra lỗi');
        }
        return redirect()->route('slide.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $object     =  $this->slide->getItem($id) ;
        if(!empty($object['slider_image'])){
            if(is_file(base_path().'/'.$object['slider_image'].'')){
                unlink(base_path().'/'.$object['slider_image'].'');
            }
        }
        $this->slide->destroys($id);
        return $this->setResponse(true,null, array('massages'=>'Xóa dữ liệu thành công !'));
    }

    // function upload files
    public function uploadFiles($request , $fileName ,$prefix = null, $uploads = 'uploads', $time , $option = null){
        $names = '';
        if($option == 'image_child'){
            $names 	= $time.'_'.date('d_m_Y').'_'.$prefix.'.'.$fileName->getClientOriginalExtension();
            $destinationPath = base_path($uploads);
            $fileName->move($destinationPath, $names);
            return $names ;
        }
        if($request->hasFile($fileName)){
            $image  = $request->file($fileName);
            $names 	= time().'_'.date('d_m_Y').'_'.$prefix.'.'.$image->getClientOriginalExtension();
            $destinationPath = base_path($uploads);
            $image->move($destinationPath, $names);
        }
        return $names ;
    }
}
