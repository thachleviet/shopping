<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 27/05/2018
 * Time: 6:09 CH
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Frontend\Product;
use App\Models\Frontend\SliderTable;

class HomeController extends  Controller
{
//    use
    public function index(){

        $mProduct       = new Product();
        $mSlide         = new SliderTable();
        // lấy danh sách sản phẩm mới
        $objectProduct            = $mProduct->getListItem();
        $objectProductTypeMale    = $mProduct->getListItemType('male', 8, false);
        $objectProductTypeFeMale  = $mProduct->getListItemType('female', 8, false);
        $_objectProductPay        = $mProduct->getListProductPay();
        $_objectSlide             = $mSlide->getList('slide');
        return view('frontend.home.index', [
            '_object'=>$objectProduct,
            '_objectTypeMale'=>$objectProductTypeMale,
            '_objectTypeFeMale'=>$objectProductTypeFeMale,
            '_objectProductPay'=>$_objectProductPay,
            '_objectSlide'=>$_objectSlide,
        ]);
    }
}