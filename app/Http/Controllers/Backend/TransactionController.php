<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 26/04/2018
 * Time: 3:58 SA
 */

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Backend\Order;
use App\Models\Backend\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade as PDF;
class TransactionController extends Controller
{
    public function indexAction(Request $request){
        $param              = $request->all();
        $mTransaction       = new Transaction() ;
        $listTransaction    = $mTransaction->getTransaction2($param,true);
        return view('backend.transaction.index', [
            'object'=>$listTransaction,
            'title'=>'Danh sách khách vãng lai giao dịch ',
            'param'=>$param
        ]);
    }


    public function confirmOrderAction2($id){
        $mTransaction       = new Transaction() ;
        $object             = $mTransaction->getItemTransaction2($id) ;
        if($mTransaction->updateTransaction(array('transaction_status'=>1), $id)){
            Mail::send( 'backend.confirm-order-cart',array(), function($message) use ($object){
                $message->to($object['email'], $object['name'])
                    ->from('doanthihuynhnhu1996@gmail.com', 'Như Shop')
                    ->subject('Xác nhận thông tin đặt hàng ');
            });
            return response()->json([
                'status' => 1,
                'data'   => ['route' => 'transaction-user.list-transaction'],
                'messages'=>'Xác nhận thành công'
            ]);
        }
    }
    public function generatePDFAction(Request $request){
        $mOrder             = new Order();
        $object             = $mOrder->getDetailTransactionUser($request->transaction_id);
        $mTransaction       = new Transaction() ;
        $objectTransaction  = $mTransaction->getItemTransaction2($request->transaction_id) ;
        $data               = ['title' => 'Chi tiết đơn đặt hàng', 'object'=>$object,'objectTransaction'=>$objectTransaction];

        $pdf                = PDF::loadView('backend.transaction.bill', $data);
        return $pdf->download('Hoa-don-'.date('d-m-Y').'.pdf')  ;
    }
    public function getDetailUserTransactionNoAccount($id){
        $mOrder             = new Order();
        $object             = $mOrder->getDetailTransactionUser($id);
        $mTransaction       = new Transaction() ;
        $objectTransaction  = $mTransaction->getItemTransaction2($id) ;
        return view('backend.transaction.detail', ['object'=>$object, 'title'=>'Chi tiết đơn đặt hàng','objectTransaction'=>$objectTransaction]);

    }

}