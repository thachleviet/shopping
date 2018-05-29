<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 29/05/2018
 * Time: 1:44 SA
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use  Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class CartController extends Controller
{

    protected  $product ;
    protected  $request ;
    protected  $order;
    public function __construct()
    {
        $this->middleware('web');

    }

    public function index(){

        return  view('frontend.cart.index', ['_object'=>Cart::content()]);
    }

    public function updateCartAction(Request $request){
        $objectProduct  = $this->product->getItem($request->input('id')) ;


        $duplicates = Cart::search(function ($cartItem) use ($request){
            return $cartItem->id === $request->input('id');
        });
        //var_dump($this->order->countProductId($request->product_id));
        if((int)$this->countQty($duplicates)+(int)$this->order->countProductId($request->input('id')) >  $objectProduct['product_number'] || ((int)$request->qty +(int)$this->order->countProductId($request->input('id'))) > (int)$objectProduct['product_number'] ){
            return response()->json([
                'status'=>2,
                'messages'=>'Sản phẩm đã hết hàng !'
            ]) ;
        }


        if($this->request->isMethod('post')){
            Cart::update($this->request->input('id'),(int)$this->request->input('qty'));
        }

        return response()->json([
            'status'=>1,
            'count'=>Cart::count(),
            'total'=>Cart::total() ,
            'messages'=>'Cập nhập giỏ hàng thành công'
        ]);
    }
    public function addCartAction(Request $request){

        Cart::add($request->product_id,$request->product_name,$request->quantity,$request->product_price,['product_image'=>$request->product_image]);
        return redirect()->route('products.detail', $request->product_id);
    }

    public function countQty($attribute){
        $qty = 0;
        foreach ($attribute as $item){
            $qty = $item->qty;
        }
        return $qty;
    }
    public function deleteCartAction(){
        if($this->request->isMethod('post')){
            Cart::remove($this->request->input('id'));
        }
        return response()->json(['status'=>1, 'count'=>Cart::count(),
            'total'=>Cart::subtotal() ,'messages'=>'Xóa dữ liệu thành công']);
    }

    public function destroy(Request $request, $id){

        Cart::remove($id);
        if($request->route == 'products.detail'){
            return redirect()->route(''.$request->route.'',$request->product_id);
        }else{
            return redirect()->route(''.$request->route.'');
        }

    }
}