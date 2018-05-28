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

class HomeController extends  Controller
{


    public function index(){
        $mProduct       = new Product();
        // lấy danh sách sản phẩm mới
        $objectProduct  = $mProduct->getListItem();

        return view('frontend.home.index', ['_object'=>$objectProduct]);
    }
}