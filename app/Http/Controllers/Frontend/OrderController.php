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
use App\Models\Frontend\TransactionTable;
use App\Models\Frontend\UserTable;
use App\Repositories\Frontend\District\DistrictRepositoryInterface;
use App\Repositories\Frontend\Province\ProvinceRepositoryInterface;
use App\Repositories\Frontend\Ward\WardRepositoryInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    protected $province ;
    protected $district ;
    protected $ward ;
    protected $request;
    protected $userTable;
    protected $transaction ;
    public function __construct(UserTable $userTable, Request $request,ProvinceRepositoryInterface $provinceRepository, DistrictRepositoryInterface $districtRepository, WardRepositoryInterface $wardRepository)
    {
        $this->middleware('web');
        $this->province     = $provinceRepository;
        $this->request      = $request ;
        $this->userTable    = $userTable;

    }

    public function indexAction(){
        $infoUser = array();
        if(Cart::count()<1) return redirect()->route('home');
        if(Auth::check()){
            $infoUser = UserTable::find(\Auth::user()->id)->toArray();
        }
        return view('frontend.order.index',[
            'provinceOption'    => $this->province->getProvinceOption(),
            'object'            =>$infoUser ,
            'percent'=>5,
            'total_pay'         =>number_format((float) str_replace(',', '', Cart::subtotal()) + ((5*(float) str_replace(',', '', Cart::subtotal()))/100),2),

        ]) ;
    }
    public function orderCartAction(Request $request){

        $this->validate($request, [
            'customer_fullname' => 'required',
            'customer_email'    => 'required|email',
            'customer_phone'    => 'required',
            'customer_address'  => 'required',
        ],[
            'customer_fullname.required' => "Vui lòng nhập họ tên",
            'customer_email.required'    => "Vui lòng nhập Email",
            'customer_email.email'       => "Vui lòng nhập đúng định dạng Email ",
            'customer_phone.required'    => "Vui lòng nhập số điện thoại",
            'customer_address.required'    => "Vui lòng nhập đại chỉ",
        ]);
        $request->session()->pull('customer_phone');
        $request->session()->pull('customer_email');
        $arrData['transaction_user_id'] = (\Auth::user()) ? \Auth::user()->id : '';
        if(!Auth::check()){
            $arrData['ward_id']             = $request->input('ward_id');
            $arrData['district_id']         = $request->input('district_id');
            $arrData['province_id']         = $request->input('province_id');
            $arrData['email_customer']      = $request->input('customer_email');
            $arrData['fullname_customer']   = $request->input('customer_fullname');
            $arrData['address_customer']    = $request->input('customer_address');
            $arrData['phone_customer']      = $request->input('customer_phone');
        }
        $month =  date('m');
        if($month <=3 && $month>=1){
            $quy = 1;
        }elseif($month>=4 && $month<=6){
            $quy = 2;
        }elseif($month>=7 && $month<=9){
            $quy = 3;
        }else{
            $quy = 4;
        }
        $arrData['transaction_month']       = date('m');
        $arrData['transaction_quy']         = $quy;
        $arrData['transaction_year']         = date('Y');
        $arrData['transaction_from']        = !empty(!Auth::check())? 'orther' : 'account';
        $arrData['transaction_note']        = $request->input('customer_discription');
        $arrData['created_at']              = date('Y-m-d H:i:s');
        $arrData['transaction_amount']      = (float) str_replace(',', '', Cart::subtotal());
        $mTransaction                       = new TransactionTable();

        $objectTransaction                  = $mTransaction->saveCart($arrData);
        if($objectTransaction){
            for ($i = 0 ; $i<count( $request->input('qty')); $i++){
                $arrOrder[$i]['product_id']      = ($request->input('product_id')) ? $request->input('product_id')[$i] : null;
                $arrOrder[$i]['count_order']     = ($request->input('qty')) ? $request->input('qty')[$i] : null;
                $arrOrder[$i]['transaction_id']  =  $objectTransaction;
                $arrOrder[$i]['user_id']         =  (\Auth::user()) ? \Auth::user()->id : null;
            }
            $mOrder  =  new OrderTable();
            foreach ($arrOrder as $key=>$value){
                $mOrder::create($value) ;
            }
            Cart::destroy();
        }
        Mail::send( 'frontend.mail-order-cart',array(), function($message) {
            $message->to(Input::get('customer_email'), Input::get('fullname_customer'))
                ->from('doanthihuynhnhu1996@gmail.com', 'Như Shop')
                ->subject('Xác nhận thông tin đặt hàng ');
        });
        return response()->json([
            'status' => 1,
            'data'   => ['route' => 'home'],
            'messages'=>'Chúc mừng bạn đã đặt hàng thành công từ hệ thống chúng tôi , chúng tôi sẽ liên hệ bạn để xác nhận'
        ]);
    }
}