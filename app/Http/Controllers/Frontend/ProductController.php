<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 22/04/2018
 * Time: 1:44 SA
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;

use App\Repositories\Frontend\Category\CategoryRepositoryInterface;
use App\Repositories\Frontend\Product\ProductRepositoryInterface;
use App\Repositories\Frontend\Slider\SliderRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;

class ProductController extends  Controller
{

    protected  $product;
    protected  $slider;
    protected  $category;
    public function __construct(CategoryRepositoryInterface $categoryRepository, ProductRepositoryInterface $productRepository,SliderRepositoryInterface $sliderRepository)
    {
        $this->middleware('web');
        $this->product  = $productRepository;
        $this->slider   = $sliderRepository;
        $this->category = $categoryRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexAction(){

        return view('frontend.product.index',[
            'listProduct' =>$this->product->getListProduct()
        ]);
    }

    public function detailProductAction($id){

        return view('frontend.product.detail-product' ,[
            'object'                => $this->product->getItem($id),
            'listProductSame'       => $this->product->getListProductSame($id),
            'listProductDiscount'   => $this->product->getListProductDiscount('product_discount'),
            'listProductNew'        => $this->product->getOptionListProduct(null, array()),
            'listImage'             => $this->product->getListImageProduct($id),
        ]);
    }

    public function getListProductIdCategoryAction($id){

        return view('frontend.product.index' ,[
            'object'                => $this->product->getItem($id),
            'listProductSame'       => $this->product->getListProductSame($id),
            'listProductDiscount'   => $this->product->getListProductDiscount('product_discount'),
            'listProductNew'        => $this->product->getOptionListProduct(null, array()),
            'listImage'             => $this->product->getListImageProduct($id),
        ]);
    }

    public function searchAction(Request $request){
        $listProduct  = $this->category->search($request['search']);
        return view('frontend.product.index', [
            'listProduct'=>$listProduct,

        ]);
    }
}