<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 23/04/2018
 * Time: 10:21 SA
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;

use App\Models\Frontend\OrderTable;
use App\Models\Frontend\ProvinceTable;
use App\Models\Frontend\TransactionTable;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;


class OrderController extends Controller
{

    public function __construct()
    {


    }

    public function index(){

        $mProvince  = new ProvinceTable();
        return view('frontend.order.index',[
            '_provinceOption'   => $mProvince->getProvinceOption(),
            '_total_pay'        => Cart::subtotal(),
            '_listCart'         => Cart::content()
        ]) ;
    }
    public function orderCartAction(Request $request){

        $this->validate($request, [
            'fullname_customer' => 'required',
            'email_customer'    => 'required|email',
            'phone_customer'    => 'required',
            'address_customer'  => 'required',
            'postcode_customer' => 'required'
        ],[
            'fullname_customer.required' => "Vui lòng nhập họ tên",
            'email_customer.required'    => "Vui lòng nhập Email",
            'email_customer.email'       => "Vui lòng nhập đúng định dạng Email ",
            'phone_customer.required'    => "Vui lòng nhập số điện thoại",
            'address_customer.required'    => "Vui lòng nhập đại chỉ",
            'postcode_customer.required'    => "Vui lòng nhập mã ",
        ]);


        $arrData['ward_id']                 = $request->input('ward_id');
        $arrData['district_id']             = $request->input('district_id');
        $arrData['province_id']             = $request->input('province_id');
        $arrData['email_customer']          = $request->input('email_customer');
        $arrData['fullname_customer']       = $request->input('fullname_customer');
        $arrData['address_customer']        = $request->input('address_customer');
        $arrData['phone_customer']          = $request->input('phone_customer');
        $arrData['postcode_customer']          = $request->input('postcode_customer');
        $arrData['created_at']              = date('Y-m-d H:i:s');
        $arrData['transaction_amount']      = (float) str_replace(',', '', Cart::subtotal());
        $mTransaction                       = new TransactionTable();
        $objectTransaction                  = $mTransaction->saveCart($arrData);
        if($objectTransaction){
            for ($i = 0 ; $i<count( $request->input('qty')); $i++){
                $arrOrder[$i]['product_id']      = ($request->input('product_id')) ? $request->input('product_id')[$i] : null;
                $arrOrder[$i]['count_order']     = ($request->input('qty')) ? $request->input('qty')[$i] : null;
                $arrOrder[$i]['transaction_id']  =  $objectTransaction;
            }
            $mOrder  =  new OrderTable();
            foreach ($arrOrder as $key=>$value){
                $mOrder::create($value) ;
            }
            Cart::destroy();
        }
        Mail::send( 'frontend.mail-order-cart',array(), function($message) {
            $message->to(Input::get('email_customer'), Input::get('fullname_customer'))
                ->from('doanthihuynhnhu1996@gmail.com', 'Như Shop')
                ->subject('Xác nhận thông tin đặt hàng ');
        });
        return redirect()->route('home');

    }

    public function orderSuccess(){

        return view('frontend.order.success');
    }
}