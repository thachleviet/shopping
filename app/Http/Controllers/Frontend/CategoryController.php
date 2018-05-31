<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 30/05/2018
 * Time: 9:56 SA
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Frontend\Menu;
use App\Models\Frontend\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{


    public function category(Request $request,$id){

        $param['page'] 		          = Input::get('page', 1);
        $param['limit']        = !empty($request->get('limit')) ? $request->get('limit') : 12;
        $mMenu                 = new Menu();
        $objectMenu            = $mMenu->getItem($id);

        $mProduct              = new Product();
        $objectProduct         = $mProduct->getListItemOfIdMenu($id, $param ,true) ;
        $objectDiscount        = $mProduct->getListItemDiscount();
        return view('frontend.category.index', [
            '_objectMenu'       => $objectMenu,
            '_objectProduct'    => $objectProduct,
            '_objectDiscount'   => $objectDiscount,
            'param'=>$param,
            'title'=>$mMenu['menu_name']
        ]);
    }

    public function getListItemTypeMale(Request $request){

        $param['page'] 	= Input::get('page', 1);
        $param['limit'] = !empty($request->get('limit')) ? $request->get('limit') : 12;

        $mProduct       =  new Product();
        $object         =  $mProduct->getListItemType('male', $param ,true);

        $objectDiscount         = $mProduct->getListItemDiscount();
        return view('frontend.category.list-male',[
            '_objectProduct'=>$object, '_objectDiscount'   => $objectDiscount,
            'param'=>$param,
            'title'=>"Đồng hồ nam"]);
    }

    public function getListItemTypeFeMale(Request $request){
        $param['page'] 	= Input::get('page', 1);
        $param['limit'] = !empty($request->get('limit')) ? $request->get('limit') : 12;
        $mProduct       =  new Product();
        $object         =  $mProduct->getListItemType('female', $param ,true);
        $objectDiscount         = $mProduct->getListItemDiscount();
        return view('frontend.category.list-female',[
            '_objectProduct'=>$object, '_objectDiscount'   => $objectDiscount,
            'param'=>$param,
            'title'=>"Đồng hồ nữ"]);
    }

    public function getListItemTypeDouble(Request $request){
        $param['page'] 	        = Input::get('page', 1);
        $param['limit']         = !empty($request->get('limit')) ? $request->get('limit') : 12;
        $mProduct               =  new Product();
        $object                 =  $mProduct->getListItemType('double', $param ,true);
        $objectDiscount         = $mProduct->getListItemDiscount();
        return view('frontend.category.list-double',[

            '_objectProduct'    => $object,
            '_objectDiscount'   => $objectDiscount,
            'param'=>$param,
            'title'=>"Đồng hồ cặp"
        ]);
    }
}