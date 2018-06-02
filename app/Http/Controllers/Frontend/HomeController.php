<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 27/05/2018
 * Time: 6:09 CH
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Frontend\News;
use App\Models\Frontend\Product;
use App\Models\Frontend\SliderTable;

class HomeController extends  Controller
{
//    use
    public function index(){
        $mNew           = new News() ;
        $mProduct       = new Product();
        $mSlide         = new SliderTable();
        // lấy danh sách sản phẩm mới
        $_objectProduct            = $mProduct->getListItem();
        $_objectProductTypeMale    = $mProduct->getListItemType('male', 8, false);
        $_objectProductTypeFeMale  = $mProduct->getListItemType('female', 8, false);
        $_objectProductPay         = $mProduct->getListProductPay();
        $_objectSlide              = $mSlide->getList('slide');
        $_objectQC                 = $mSlide->getQc();
        $_objectGuide              = $mNew->getGuide();
        return view('frontend.home.index', [
            '_object'           => $_objectProduct,
            '_objectTypeMale'   => $_objectProductTypeMale,
            '_objectTypeFeMale' => $_objectProductTypeFeMale,
            '_objectProductPay' => $_objectProductPay,
            '_objectSlide'      => $_objectSlide,
            '_objectQC'         => $_objectQC,
            '_objectGuide'      => $_objectGuide,
            'title'             => "Trang chủ"
        ]);
    }
}