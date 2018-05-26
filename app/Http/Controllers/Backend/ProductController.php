<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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



        return view('backend.product.create', ['_title'=>'Thêm sản phẩm']);
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
//            'product_description'       => 'required'
        ],[
            'product_name.required'         => 'Tên sản phẩm bắt buộc !',
            'product_price.required'        => 'Giá bắt buộc !',
            'product_image.required'        => 'Hình bắt buộc !',
//            'product_content.required'      => 'Nội dung bắt buộc ',
//
//            'product_description.required'  => 'Mô tả bắt buộc'
        ]);
       $param = $request->all();
       echo '<pre>';
       print_r($param) ;
        echo '</pre>';
        die();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
