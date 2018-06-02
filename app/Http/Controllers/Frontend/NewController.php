<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 01/06/2018
 * Time: 4:38 SA
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Frontend\News;
use App\Models\Frontend\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class NewController extends Controller
{
    protected $_product;
    protected $_new ;
    public function __construct(News $news, Product $product)
    {
        $this->_new  = $news;
        $this->_product  = $product;
    }

    public function index(Request $request){
        $param['page'] 	        = Input::get('page', 1);
        $param['limit']         = !empty($request->get('limit')) ? $request->get('limit') : 12;
        $objectDiscount         = $this->_product->getListItemDiscount();
        return view('frontend.new.index',[
            '_object'=>$this->_new->getAll($param),
            '_related'=>$this->_new->getListRelated($param),
            '_objectDiscount'   => $objectDiscount,
            'title'=>"Bài viết"
        ]);
    }


    public function detail($id){
        $objectDiscount         = $this->_product->getListItemDiscount();
        return view('frontend.new.detail',[
            '_object'=>$this->_new->getItem($id),
            '_related'=>$this->_new->getListRelated($id),
            '_objectDiscount'   => $objectDiscount,
            'title'=>"Chi tiết  bài viết"
        ]);
    }
    public function guide($id){
        $objectDiscount         = $this->_product->getListItemDiscount();
        return view('frontend.new.detail',[
            '_object'=>$this->_new->getItem($id),
            '_related'=>$this->_new->getListRelated($id),
            '_objectDiscount'   => $objectDiscount,
            'title'=>"Giới thiệu bài viết"
            ]);
    }
}