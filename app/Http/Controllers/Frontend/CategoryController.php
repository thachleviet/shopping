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

    protected $_menu;

    protected $_product;
    public function __construct(Menu $menu, Product $product)
    {
        $this->_menu        = $menu;
        $this->_product     = $product;
    }

    public function category(Request $request,$id){

        $param['page'] 		   = Input::get('page', 1);
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

    public function searchProduct(Request $request){
        $param['page'] 	        = Input::get('page', 1);
        $param['search'] 	    = $request->input('search');
        $param['limit']         = !empty($request->get('limit')) ? $request->get('limit') : 12;
        $listProductSearch      = array();
        $objectDiscount         = $this->_product->getListItemDiscount();
        if(empty($request->input('search'))){

            return view('frontend.category.search', [
                '_objectProduct'    => $listProductSearch,
                '_objectDiscount'   => $objectDiscount,
                'param'=>$param,
                'title'=>$param['search']
            ]);
        }
        $listProductSearch      = $this->_product->search($request->input('search'), $param ,true);
        if($listProductSearch->count() <1){
            $listProductSearch  = $this->_menu->search($request->input('search') , $param ,true);
        }
        return view('frontend.category.search', [
            '_objectProduct'    => $listProductSearch,
            '_objectDiscount'   => $objectDiscount,
            'param'=>$param,
            'title'=>$param['search']
        ]);
    }
}