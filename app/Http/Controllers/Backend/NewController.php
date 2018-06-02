<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Backend\Menu;
use App\Models\Backend\News;
use Illuminate\Http\Request;

class NewController  extends  Controller
{
    protected $_news;
    public function __construct(News $news)
    {

        $this->middleware(['auth:admin']);
        $this->_news  = $news;
    }

    public function index(Request $request){
        return view('backend.new.index' , [
            '_object'=>$this->_news->getAll(),
            '_title'=>'Danh sách bài viết',
            '_param'=>$request->only('page', 1)]);
    }
    public function changeStatus(Request $request)
    {
        $param  = $request->all();

        $data  = [
            'new_status'=>($param['action'] == 'active') ? 0 : 1
        ];


        $this->_news->updates($data, $param['id']);

        return $this->setResponse(true, null , array('messages'=>'Cập nhật dữ liệu thành công !'));
    }
    public function create(){

        return view('backend.new.create', [
            '_title'=>'Thêm bài viết',
            ]);

    }
    public function store(Request $request){

        $this->validate($request,[
            'new_title'              => 'required',
            'new_description'        => 'required',
            'new_content'            => 'required',
            'new_image'              => 'required|mimes:jpeg,jpg,png'
        ],[
            'new_image.mimes'                 => 'Hình ảnh phải đúng định dạng jpeg,jpg,png',
            'new_image.required'                  => 'Hình ảnh bắt buộc',
            'new_content.required'              => 'Nội dung bài viết',
            'new_title.required'                => 'Tiêu đề bài viết',
            'new_description.required'          => 'Mô tả bài viết',
        ]);
        if($this->_news->store($this->arrayObject($request)) ){
            $request->session()->flash('message_success', 'Thêm dữ liệu thành công');
            return redirect()->route('new');
        }
        $request->session()->flash('message_warning', 'Đã xãy ra lỗi');
        return redirect()->route('new.create');
    }
    function arrayObject($request)
    {

        return [
            'new_image'        =>'uploads/'.$this->uploadFiles($request,'new_image','new_image','uploads', null, null),
            'new_title'        => $request->input('new_title'),
            'new_description'  => $request->input('new_description'),
            'new_content'      => $request->input('new_content'),
            'new_status'       => $request->input('new_status'),
            'new_type'         => $request->input('new_type')
        ];
    }
    public function edit($id){

        $oNew   =   $this->_news->getItem($id) ;

        return view('backend.new.edit', [

            '_object'=>$oNew, '_title'=>'Cập nhật bài viết'
        ]);
    }


    public function update(Request $request, $id){

        try{
            $this->validate($request,[
                'new_title'              => 'required',
                'new_description'        => 'required',
                'new_content'            => 'required',
            ],[
                'new_content.required'              => 'Nội dung bài viết',
                'new_title.required'                => 'Tiêu đề bài viết',
                'new_description.required'          => 'Mô tả bài viết',
            ]);
            if($request->hasFile('new_image')){
                $this->validate($request,[
                    'new_image'              => 'required|mimes:jpeg,jpg,png'
                ],[
                    'new_image.mimes'                 => 'Hình ảnh phải đúng định dạng jpeg,jpg,png',
                    'new_image.required'                  => 'Hình ảnh bắt buộc',
                ]);
            }
            $item  = $this->_news->getItem($id);
            $data['new_title']        = $request->input('new_title');
            $data['new_description']  = $request->input('new_description');
            $data['new_content']      = $request->input('new_content');
            $data['new_status']       = $request->input('new_status');
            $data['new_type']         = $request->input('new_type');
            if($request->hasFile('new_image')){
                if(!empty($item['new_image'])){
                    if(is_file(public_path().'/'.$item['new_image'].'')){
                        unlink(public_path().'/'.$item['new_image'].'');
                    }
                }
                $data['new_image']= 'uploads/'.$this->uploadFiles($request,'new_image','new_image','uploads', null, null);
            }
            if($this->_news->updates($data, $id)){
                $request->session()->flash('message_success', 'Cập nhật dữ liệu thành công');
                return redirect()->route('new');
            }
        }catch (\Exception $exception){
            $request->session()->flash('message_warning', 'Đã xãy ra lỗi');
        }
        return redirect()->route('new.edit',$id);
    }

    public function destroy($id){
        $object     =  $this->_news->getItem($id) ;
        if(!empty($object['new_image'])){
            if(is_file(base_path().'/'.$object['new_image'].'')){
                unlink(base_path().'/'.$object['new_image'].'');
            }
        }
        $this->_news->destroys($id);
        return $this->setResponse(true,null, array('massages'=>'Xóa dữ liệu thành công !'));
    }

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