<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\AttributeProduct;
use App\Models\Backend\ImageProduct;
use App\Models\Backend\Menu;
use App\Models\Backend\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    protected $_product;

    public function __construct()
    {
        $this->_product  = new Product() ;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('backend.product.index' , [
            '_object'=>$this->_product->getAll(),
            '_title'=>'Danh sách sản phẩm',
            '_param'=>$request->only('page', 1)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mMenu = new Menu();

        return view('backend.product.create', [
            '_title'=>'Thêm sản phẩm',
            '_menu'=>$mMenu->getListMenuOfProduct()]);
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
            'product_name'              => 'required',
            'product_price'             => 'required',
            'product_image'             => 'required|mimes:jpeg,jpg,png',
        ],[
            'product_name.required'         => 'Tên sản phẩm bắt buộc !',
            'product_price.required'        => 'Giá bắt buộc !',
            'product_image.required'        => 'Hình bắt buộc !',
        ]);
        $objectId        = $this->_product->store($this->arrayObject($request , 'add')) ;
        if($objectId && $request->hasFile('images')){
            foreach ($request->file('images') as $key=>$item){
                $imageChild['product_id']       = $objectId->id;
                $imageChild['created_at']       = date('Y-m-d H:i:s');
                $imageChild['image_product']    = 'uploads/'.$this->uploadFiles($request, $item, 'images','uploads', $key.time(), 'image_child');
                DB::table('image_product')->insert($imageChild) ;
            }
        }
        $param  = $request->all()['attribute'];
        $attribute = [];
        if($param['key']){
           for ($i=0 ; $i < count($param['key']); $i++){
                $attributes['key']          = ($param['key']) ? $param['key'][$i] : '';
                $attributes['value']        = ($param['value']) ? $param['value'][$i] : '';
                $attributes['product_id']   = $objectId->id;
                $attributes['created_at']   = date('Y-m-d H:i:s');
                $attribute[]                = $attributes;
           }
        }
        $mAttributeProduct = new AttributeProduct();
        $mAttributeProduct->store($attribute);
        return redirect()->route('product') ;
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

    function arrayObject($request , $action){
        if($action == 'add'){
            return [
                'product_name'          => $request->input('product_name'),
                'product_status'        => $request->input('product_status'),
                'product_price'         => preg_replace("~\D~", "", (str_replace('.00', '',$request->input('product_price')))),
                'product_image'         => 'uploads/'.$this->uploadFiles($request, 'product_image', 'product_image','uploads', time()),
                'product_menu_id'       => $request->input('menu'),
                'created_at'            => date('Y-m-d H:i:s'),
                'product_content'       => $request->input('product_content'),
                'product_description'   => $request->input('product_description'),
            ];
        }else{
            $array  =  [
            'product_name'          => $request->input('product_name'),
                'product_status'        => $request->input('product_status'),
                'product_price'         => preg_replace("~\D~", "", (str_replace('.00', '',$request->input('product_price')))),
                'product_menu_id'       => $request->input('menu'),
                'created_at'            => date('Y-m-d H:i:s'),
                'product_content'       => $request->input('product_content'),
                'product_description'   => $request->input('product_description'),
            ];
            if($request->hasFile('product_image')){
                $array['product_image'] =  'uploads/'.$this->uploadFiles($request, 'product_image', 'product_image','uploads', time()) ;
               return array_merge($array, $array);
            }

            return $array;
        }

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
            'product_status'=>($param['action'] == 'active') ? 0 : 1
        ];


        $this->_product->updates($data, $param['id']);

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
        $mMenu      = new Menu();
        $mAttribute = new AttributeProduct();
        $mImageProduct = new ImageProduct();
        $oProduct   =   $this->_product->getItem($id) ;
        return view('backend.product.edit', [
                        '_menu'         => $mMenu->getListMenuOfProduct(),
                        '_object'       => $oProduct,
                        '_attribute'    => $mAttribute->getAttributeOfProduct($id),
                        '_image'       => $mImageProduct->getImageOfProduct($id),
                        '_title'        => 'Cập nhật sản phẩm'
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
        if($request->hasFile('product_image')){
            $object =  $this->_product->getItem($id) ;
            $this->validate($request, [
                'product_image'               => 'mimes:jpeg,jpg,png',
            ],[
                'product_image.mimes'         =>'Hình ảnh phải đúng đinh dạng jpeg,jpg,png',
            ]);
            if(!empty($object['product_image'])){
                if(is_file(public_path().'/'.$object['product_image'].'')){
                    unlink(public_path().'/'.$object['product_image'].'');
                }
            }
        }
        $this->_product->updates($this->arrayObject($request , 'update'), $id) ;
        $param  = !empty($request->all()['attribute']) ? $request->all()['attribute'] : '';

        $attribute = [];
        if($param){
            for ($i=0 ; $i < count($param['key']); $i++){
                $attributes['key']          = !empty($param['key']) ? $param['key'][$i] : '';
                $attributes['value']        = !empty($param['value']) ? $param['value'][$i] : '';
                $attributes['product_id']   = $id;
                $attributes['created_at']   = date('Y-m-d H:i:s');
                $attribute[]                = $attributes;
            }
        }
        if(!empty($request->all()['images'])){
            $this->handImageUpdate($request);
        }
        $mAttributeProduct = new AttributeProduct();
        $mAttributeProduct->deleteIn($id);
        $mAttributeProduct->store($attribute);

        return redirect()->route('product') ;
    }


    public function handImageUpdate($request){
        $mImage  = new ImageProduct();
        $param      = $request->all()['images'] ;
        for ($i = 0 ; $i<count($param['image_id']); $i++){
                $arr['image_id']        = !empty($param['image_id'][$i]) ? $param['image_id'][$i] : '' ;
                $arr['product_id']      = $request->input('product_id'); ;
                $arr['image_product']   = !empty($param['image_product'][$i]) ? $param['image_product'][$i] : '' ;
                if(!empty($arr['image_product'])){
                    $arr['image_product'] = 'uploads/'.$this->uploadFiles($request, $param['image_product'][$i], 'images','uploads', $i.time(), 'image_child');
                }
                if(!empty($arr['image_id']) && !empty($arr['image_product'])){
                    $mImage->updates($arr, $arr['image_id']);
                }
                if(empty($arr['image_id']) && !empty($arr['image_product'])){
                    $mImage->store($arr);
                }

        }
        return true;

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // model Image Product
        $mImageProduct  = new ImageProduct();
        $ImageProduct = $mImageProduct->getImageOfProduct($id);
        foreach ($ImageProduct as $key=>$value){
            if(!empty($value['image_product'])){
                if(is_file(public_path().'/'.$value['image_product'].'')){
                    unlink(public_path().'/'.$value['image_product'].'');
                }
            }
        }
        $mImageProduct->deleteIn($id) ;
        // model Attribute Product
        $mAttribute     = new AttributeProduct();

        $mAttribute->deleteIn($id);
        // model product
        $mProduct   = new Product();

        $object     =  $this->_product->getItem($id) ;
        if(!empty($object['product_image'])){
            if(is_file(public_path().'/'.$object['product_image'].'')){
                unlink(public_path().'/'.$object['product_image'].'');
            }
        }
        $mProduct->destroys($id);
        return $this->setResponse(true,null, array('massages'=>'Xóa dữ liệu thành công !'));
    }
}
