<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 22/04/2018
 * Time: 1:31 CH
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\OrderTable;
use App\Repositories\Backend\Product\ProductRepositoryInterface;
use  Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CartController extends Controller
{

    protected  $product ;
    protected  $request ;
    protected  $order;
    public function __construct(Request $request,OrderTable $orderTable, ProductRepositoryInterface $productRepository)
    {
        $this->middleware('web');
        $this->product = $productRepository ;
        $this->request = $request;
        $this->order   = $orderTable;
    }

    public function showAction(){
        return  View::make('frontend.cart.modal-cart', ['Object'=>Cart::content()])->render();
    }

    public function updateCartAction(Request $request){
        $objectProduct  = $this->product->getItem($request->input('id')) ;
        // kiểm tra số lươnh\

//        if($objectProduct['product_number'] < $request->input('qty') || $objectProduct['product_number'] < (int)$this->order->countProductId($request->input('id'))){
//            return response()->json([
//                'status'=>2,
//                'messages'=>'Sản phẩm đã hết hàng !'
//            ]) ;
//        }
//        $duplicates = Cart::search(function ($cartItem) use ($request){
//            return $cartItem->id === $request->input('id');
//        });
//
//        if(($this->countQty($duplicates)+$this->order->countProductId($this->request->product_id)) >  $objectProduct['product_number']){
//            return response()->json([
//                'status'=>2,
//                'messages'=>'Sản phẩm đã hết hàng !'
//            ]) ;
//        }

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
        $objectProduct  = $this->product->getItem($request->product_id) ;
        // kiểm tra số lương

//        if((int)$objectProduct['product_number'] < (int)$request->qty ||  $objectProduct['product_number'] < $this->order->countProductId($request->product_id)){
//            return response()->json([
//                'status'=>2,
//                'messages'=>'Sản phẩm đã hết hàng !'
//            ]) ;
//        }
        $duplicates = Cart::search(function ($cartItem) use ($request){
            return $cartItem->id === $request->product_id;
        });
        //var_dump($this->order->countProductId($request->product_id));
        if((int)$this->countQty($duplicates)+(int)$this->order->countProductId($request->product_id) >  $objectProduct['product_number'] || ((int)$request->qty +(int)$this->order->countProductId($request->product_id)) > (int)$objectProduct['product_number'] ){
            return response()->json([
                'status'=>2,
                'messages'=>'Sản phẩm đã hết hàng !'
            ]) ;
        }

        Cart::add($this->request->product_id,$this->request->product_name,$this->request->qty,$this->request->product_price,['product_image'=>$this->request->product_image]);
        return response()->json([
            'status'=>1,
            'count'=>Cart::count(),
            'total'=>Cart::subtotal() ,
            'messages'=>'Thêm '.$this->request->qty.' sản phẩm thành công !'
        ]) ;
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
}