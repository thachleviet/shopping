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
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function __construct()
    {
    }


    public function index(){



    }

    public function detail(Request $request, $id,$slug){
        $mProduct               = new Product();
        $object                 = $mProduct->getItem((int)$id);
        if(!$object){
            return redirect()->route('home');
        }
        if($object['slug'] !== $slug) {
            return redirect()->route('san-pham.detail', ['id' => $id, 'slug' => $object['slug']]);
        }
        $attributeProduct       = new AttributeProduct();
        $related                = $mProduct->related($object['product_menu_id'],$id, $object['product_type']);
        $mImage                 = new ImageProduct();
        $ImageProduct           = $mImage->getImageOfProduct($id);

        $listAttributeProduct   = $attributeProduct->getAttributeOfProduct($id);


        return view('frontend.product.detail-product',[
            '_object'           => $object,
            '_attributeProduct' => $listAttributeProduct,
            '_related'          => $related,
            '_imageProduct'     => $ImageProduct,
            'title'             => $object['product_name'],
            '_image'            => asset($object['product_image']),
            'keyword'           => $object['product_keyword'],
//            '_price'            => $object
        ]);
    }
}