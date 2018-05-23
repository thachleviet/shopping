<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\Category\CategoryRepositoryInterface;
use App\Repositories\Backend\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    protected $product;
    protected $category;
    protected $request;
    public function __construct(Request $request, ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->middlewareAction();
        $this->product    = $productRepository;
        $this->category   = $categoryRepository;
        $this->request    = $request;
    }
    public function middlewareAction(){
        $this->middleware('auth:admin');
    }

    public function indexAction(){
        $title          = 'Danh mục sản phẩm' ;
        $listProduct    = $this->product->listItem();
        return view('backend.product.index' ,array('title'=>$title, 'object'=>$listProduct));
    }
    /*
     * function add Items
     * @author
     */
    public function submitAddAction(){

        $this->validate($this->request,[
            'product_name'              => 'required',
            'product_price'             => 'required',
            'product_price_input'             => 'required',
            'product_image'             => 'required|mimes:jpeg,jpg,png',
            'product_image_intro'       => 'required|mimes:jpeg,jpg,png',
            'product_category_id'       => 'required',
            'product_code'              => 'required|unique:products',
            'product_number'            => 'required',
            'product_description'       => 'required'
        ],[
            'product_name.required'         => 'Tên sản phẩm bắt buộc !',
            'product_price.required'        => 'Giá bắt buộc !',
            'product_price_input.required'        => 'Giá nhập bắt buộc !',
            'product_image.required'        => 'Hình bắt buộc !',
            'product_category_id.required'  => 'Danh mục bắt buộc !',
            'product_content.required'      => 'Nội dung bắt buộc ',
            'product_code.required'         => 'Mã sản phẩm bắt buộc ',
            'product_code.unique'           => 'Mã sản phẩm không được trùng',
            'product_number.required'       => 'Số lượng bắt buộc !',
            'product_description.required'  => 'Mô tả bắt buộc'
        ]);
        $objectId = $this->product->add($this->arrayObject()) ;

        if($objectId && $this->request->hasFile('images')){
            foreach ($this->request->file('images') as $key=>$item){
                $imageChild['product_id']       = $objectId;
                $imageChild['created_at']       = date('Y-m-d H:i:s');
                $imageChild['image_product']    = 'uploads/'.$this->uploadFiles($this->request, $item, 'images','uploads', $key.time(), 'image_child');
                DB::table('image_product')->insert($imageChild) ;
            }
        }
        return redirect()->route('product') ;
    }

    function arrayObject(){
       return [
            'product_name'          => $this->request->input('product_name'),
            'product_status'        => $this->request->input('is_active'),
            'product_price'         => preg_replace("~\D~", "", (str_replace('.00', '',$this->request->input('product_price')))),
            'product_price_input'             => preg_replace("~\D~", "", (str_replace('.00', '',$this->request->input('product_price')))),
            'product_image'         => 'uploads/'.$this->uploadFiles($this->request, 'product_image', 'product_image','uploads', time()),
            'product_image_intro'   => 'uploads/'.$this->uploadFiles($this->request, 'product_image_intro', 'product_image_intro','uploads' ,time()),
            'product_category_id'   => $this->request->input('product_category_id'),
            'product_created_at'    => date('Y-m-d H:i:s'),
            'product_content'       => $this->request->input('product_content'),
            'product_color'         => $this->request->input('product_color'),
            'product_code'          => $this->request->input('product_code'),
            'product_material'      => $this->request->input('product_material'),
            'product_type_designs'  => $this->request->input('product_type_designs'),
            'product_suitable'      => $this->request->input('product_suitable'),
            'product_number'        => $this->request->input('product_number'),
            'product_description'   => $this->request->input('product_description'),
        ];
    }
    /*
     * function form add product
     * @author Huynh Nhu
     */
    public function addAction(){
        $listCategory   = $this->category->listItem();
        $this->multiMenuLevel($listCategory , 0, 2, $oList);

        $title = 'Thêm  sản phẩm';
        return view('backend.product.add' ,array('object'=>$oList, 'title'=>$title));
    }
    /*
    * function form edit product
    * @author Huynh Nhu
    */
    public function editAction($id){
        $item           = $this->product->getItem($id)  ;
        $listCategory   = $this->category->listItem();
        $this->multiMenuLevel($listCategory , 0, 2, $oList);
        $title = 'Cập nhật  sản phẩm';
        return view('backend.product.edit' ,array('object'=>$oList,'item'=>$item, 'title'=>$title));
    }
    /*
     * function submit edit item
     * @author
     */
    public function submitEditAction(){
        $item  = $this->product->getItem($this->request->input('product_id'))  ;
        $this->validate($this->request,[
            'product_name'                  => 'required|unique:products,product_name,'.$item['product_id'].',product_id',
            'product_price'                 => 'required',
            'product_category_id'           => 'required',
            'product_code'                  => 'required|unique:products,product_code,'.$item['product_id'].',product_id',
            'product_number'                => 'required',
            'product_description'           => 'required'
        ],[
            'product_name.required'         =>'Tên sản phẩm bắt buộc !',
            'product_price.required'        =>'Giá bắt buộc !',
            'product_category_id.required'  =>'Danh mục bắt buộc !',
            'product_number.required'       => 'Số lượng bắt buộc',
            'product_code.unique'           =>'Mã sản phẩm  đã tồn tại',
            'product_name.unique'           =>'Mã sản phẩm  đã tồn tại',
            'product_description.required'  => 'Mô tả bắt buộc'
        ]);

        if($this->request->hasFile('product_image')){
            $this->validate($this->request, [
                'product_image'               => 'mimes:jpeg,jpg,png',
            ],[
                'product_image.mimes'         =>'Hình ảnh phải đúng đinh dạng jpeg,jpg,png',
            ]);
            $arrData['product_image']           = 'uploads/'.$this->uploadFiles($this->request, 'product_image', 'product_image','uploads', time());
            if(!empty($item['product_image'])){
                if(is_file(public_path().'/'.$item['product_image'].'')){
                    unlink(public_path().'/'.$item['product_image'].'');
                }
            }

        }
        if($this->request->hasFile('product_image_intro')){
            $this->validate($this->request, [

                'product_image_intro'         => 'mimes:jpeg,jpg,png',
            ],[
                'product_image_intro.mimes'   =>'Hình ảnh Intro phải đúng đinh dạng jpeg,jpg,png',
            ]);
            $arrData['product_image_intro']     = 'uploads/'.$this->uploadFiles($this->request, 'product_image_intro', 'product_image_intro','uploads', time());
            if(!empty($item['product_image'])){
                if(is_file(public_path().'/'.$item['product_image_intro'].'')){
                    unlink(public_path().'/'.$item['product_image_intro'].'');
                }
            }
        }
        $arrData['product_name']            = $this->request->input('product_name');
        $arrData['is_active']               = $this->request->input('is_active');
        $arrData['product_price']           = preg_replace("~\D~", "", str_replace('.00', '',$this->request->input('product_price')));
        $arrData['product_category_id']     = $this->request->input('product_category_id');
        $arrData['product_created_at']      = date('Y-m-d H:i:s');
        $arrData['product_id']              = $this->request->input('product_id');
        $arrData['product_content']         = $this->request->input('product_content');
        $arrData['product_color']           = $this->request->input('product_color');
        $arrData['product_code']            = $this->request->input('product_code');
        $arrData['product_material']        = $this->request->input('product_material');
        $arrData['product_type_designs']    = $this->request->input('product_type_designs');
        $arrData['product_suitable']        = $this->request->input('product_suitable');
        $arrData['product_number']          = $this->request->input('product_number');
        $arrData['product_description']     = $this->request->input('product_description');

        if($this->product->update($arrData,array('action'=>'edit'))){
            return redirect()->route('product') ;
        }
        return route('product.edit', $this->request->input('product_id'));
    }

    // function upload files
    public function uploadFiles($request , $fileName ,$prefix = null, $uploads = 'uploads', $time , $option = null){
        $names = '';
        if($option == 'image_child'){
            $names 	= $time.'_'.date('d_m_Y').'_'.$prefix.'.'.$fileName->getClientOriginalExtension();
            $destinationPath = public_path($uploads);
            $fileName->move($destinationPath, $names);
            return $names ;
        }
        if($request->hasFile($fileName)){
            $image  = $request->file($fileName);
            $names 	= time().'_'.date('d_m_Y').'_'.$prefix.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path($uploads);
            $image->move($destinationPath, $names);
        }
        return $names ;
    }
    /*
    * function change status
    * @author Huynh Nhu
    */
    public function multiMenuLevel($list, $parent = 0,$level = 1 , &$newArr){
        if(count($list)>0){
            foreach($list as $key=>$values){
                if($values['category_parent_id'] == $parent){
                    $values['level'] = $level;
                    $newArr[]   = $values;
                    $parents    = $values['category_id'] ;
                    unset($list[$key]);
                    $this->multiMenuLevel($list, $parents ,$level + 1 ,$newArr);
                }
            }
        }
    }
    /*
     * function change status
     * @author Huynh Nhu
     */
    public function changeStatusAction(Request $request){

        if($request->isMethod('post')){
           $product_status =  $this->product->update($this->request->only(['product_status', 'product_id']), array('action'=>'change-status'));
        }
        return response()->json(['status'=>1, 'data'=> $product_status, 'messages'=>'Cập nhật dữ liệu thành công']);
    }
    /*
         * function delete  items
         * @author huynh nhu
         */
    public function removeAction($id){
        $item   = $this->product->getItem($id)  ;
        if(!empty($item['product_image'])){
            if(is_file(public_path().'/'.$item['product_image'].'')){
                unlink(public_path().'/'.$item['product_image'].'');
            }
        }
        $this->product->deleteItem($id) ;
        return response()->json([
            'error'   => 0,
            'message' => 'Remove success'
        ]);
    }
    /*
     * function delete multi items
     * @author huynh nhu
     */
    public function removeMultiAction(){
        if($this->product->deleteItemMulti($this->request->only('data'))){
            return response()->json(['status'=>1, 'message_success'=>'Đã xóa một thể loại']);
        }
        return response()->json(['status'=>0, 'message_warning'=>'Xóa dữ liệu không thành công']);
    }

}