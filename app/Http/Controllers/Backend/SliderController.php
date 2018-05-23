<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 22/04/2018
 * Time: 5:49 CH
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\Slider\SliderRepositoryInterface;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SliderController extends  Controller
{
    protected $slider;
    protected $request ;
    public function __construct(Request $request ,SliderRepositoryInterface $sliderRepository)
    {
        $this->middlewareAction();
        $this->request = $request ;

        $this->slider  = $sliderRepository  ;
    }


    public function middlewareAction(){
        $this->middleware('auth:admin');
    }
    public function indexAction(){
        $title          = "Danh sách slider" ;

        $listProduct    = $this->slider->listItem();

        return view('backend.slider.index', ['title'=>$title, 'object'=>$listProduct]) ;
    }

    public function addAction(){
        $title          = "Thêm slider" ;
        return view('backend.slider.add',['title'=>$title]) ;
    }

    public  function submitAddAction(){

        $this->validate($this->request,[
            'slide_image'           => 'required',
        ],[
            'slide_image.required'  => 'Hình ảnh bắt buộc',
        ]);
        $arrObject['slide_status']    = $this->request->input('is_active');

        $arrObject['slide_image']       = 'uploads/'.$this->uploadFiles($this->request, 'slide_image', 'slide_image','uploads');


        if($this->slider->add($arrObject))

        return redirect()->route('slider');
    }
    public function uploadFiles($request , $fileName ,$prefix = null, $uploads = 'uploads'){
        $names = '';

        if($request->hasFile($fileName)){

            $image  = $request->file($fileName);

            $names 	= time().'_'.date('d_m_Y').'_'.$prefix.'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path($uploads);

            $image->move($destinationPath, $names);
        }
        return $names ;
    }
    public function editAction($id){

        $item  = $this->slider->getItem($id) ;
        return view('backend.slider.edit', ['item'=>$item, 'title'=>'Cập nhật Slide']);
    }

    public function submitEditAction(){

//        $item  = $this->slider->getItem($id) ;
        $item  = $this->slider->getItem($this->request->input('slide_id'))  ;
        if($this->request->hasFile('slide_image')){
            $this->validate($this->request,[
                'slide_image'           => 'mimes:jpeg,jpg,png',
            ],[
                'slide_image.mimes'  => 'Hình ảnh không đúng định dạng ',
            ]);
            $arrObject['slide_image']       = 'uploads/'.$this->uploadFiles($this->request, 'slide_image', 'slide_image','uploads');
            if(!empty($item['product_image'])){
                if(is_file(public_path().'/'.$item['slide_image'].'')){
                    unlink(public_path().'/'.$item['slide_image'].'');
                }
            }
        }
        $arrObject['slide_status']    = $this->request->input('is_active');
        $arrObject['slide_id']    = $this->request->input('slide_id');
        if($this->slider->update($arrObject,array('action'=>'edit'))){
            return redirect()->route('slider') ;
        }
        return route('slider.edit', $this->request->input('slide_id'));
//        $arrObject['slide_image']       = 'uploads/'.$this->uploadFiles($this->request, 'slide_image', 'slide_image','uploads');

    }

    public function removeAction($id){
        $item   = $this->slider->getItem($id)  ;
        if(!empty($item['slide_image'])){
            if(is_file(public_path().'/'.$item['slide_image'].'')){
                unlink(public_path().'/'.$item['slide_image'].'');
            }
        }
        $this->slider->deleteItem($id) ;
        return response()->json([
            'error'   => 0,
            'message' => 'Remove success'
        ]);
    }

    public function deleteMultiAction(){

    }

    public function changeStatusAction(){

    }
}