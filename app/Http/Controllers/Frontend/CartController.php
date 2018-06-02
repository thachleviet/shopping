<?php


namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use  Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;


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

        return  view('frontend.cart.index', [
            '_object'   => Cart::content(),
            'count'     => Cart::count(),
            'total'     => Cart::subtotal(),
            'title'     => "Thông tin giỏ hàng"]);

    }

    public function update(Request $request){
        for ($i = 0  ; $i<count($request->input()['qty']); $i++){
            $data['rowId']  = !empty($request->input()['rowId']) ? $request->input()['rowId'][$i] : null;
            $data['qty']    = !empty($request->input()['rowId']) ? $request->input()['qty'][$i] : null;
             Cart::update($data['rowId'],(int)$data['qty']);
        }
        return redirect()->route('cart');
    }

    public function add(Request $request){
        Cart::add($request->product_id,$request->product_name,$request->quantity,($request->product_discount>0)? ($request->product_price * (100 - $request->product_discount)/100): $request->product_price,['product_image'=>$request->product_image,'slug'=>$request->slug]);
        return redirect()->route('san-pham.detail', [$request->product_id,$request->slug]);
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