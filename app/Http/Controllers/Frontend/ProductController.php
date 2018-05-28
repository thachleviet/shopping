<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 28/05/2018
 * Time: 2:17 CH
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Backend\AttributeProduct;
use App\Models\Frontend\ImageProduct;
use App\Models\Frontend\Product;


class ProductController extends Controller
{
    public function __construct()
    {
    }


    public function index(){



    }

    public function detail($id){

        $mProduct               = new Product();
        $object                 = $mProduct->getItem($id);
        $attributeProduct       = new AttributeProduct();
        $related                = $mProduct->related($object['product_menu_id'],$id);
        $mImage                 = new ImageProduct();
        $ImageProduct           = $mImage->getImageOfProduct($id);

        $listAttributeProduct   = $attributeProduct->getAttributeOfProduct($id);
        return view('frontend.product.detail-product',[
            '_object'           => $object,
            '_attributeProduct' => $listAttributeProduct,
            '_related'          => $related,
            '_imageProduct'     => $ImageProduct
        ]);
    }
}