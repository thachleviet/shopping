<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 26/04/2018
 * Time: 3:58 SA
 */

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\Backend\TransactionTable;
use App\Models\Backend\OrderTable;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{

    public function indexAction(Request $request){
        $param              = $request->all();
        $mTransaction       = new TransactionTable() ;
        $listTransaction    = $mTransaction->getTransaction($param);

        return view('backend.transaction-user.index', [
            'object'=>$listTransaction,
            'title'=>'Danh sách user thành viên giao dịch ',
            'param'=>$param
        ]);
    }

    public function confirmOrderAction($id){
        $mTransaction       = new TransactionTable() ;
        $object             = $mTransaction->getItemTransaction($id) ;
        if($mTransaction->updateTransaction(array('transaction_status'=>1), $id)){
            Mail::send( 'backend.confirm-order-cart',array(), function($message) use ($object){
                $message->to($object['email'], $object['name'])
                    ->from('doanthihuynhnhu1996@gmail.com', 'Như Shop')
                    ->subject('Xác nhận thông tin đặt hàng ');
            });
            return response()->json([
                'status' => 1,
                'data'   => ['route' => 'transaction-user'],
                'messages'=>'Xác nhận thành công'
            ]);
        }
    }

    public function confirmOrderAction2($id){
        $mTransaction       = new TransactionTable() ;
        $object             = $mTransaction->getItemTransaction($id) ;
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


    public function detailTransactionUserAction($id){

        $mOrder             = new OrderTable();
        $object             = $mOrder->getDetailTransactionUser($id);
        $mTransaction       = new TransactionTable() ;
        $objectTransaction  = $mTransaction->getItemTransaction($id) ;


        return view('backend.transaction-user.detail', ['object'=>$object, 'title'=>'Chi tiết đơn đặt hàng','objectTransaction'=>$objectTransaction]);
    }

    public function generatePDFAction(Request $request){
        $mOrder             = new OrderTable();
        $object             = $mOrder->getDetailTransactionUser($request->transaction_id);
        $mTransaction       = new TransactionTable() ;
        $objectTransaction  = $mTransaction->getItemTransaction($request->transaction_id) ;
        $data               = ['title' => 'Chi tiết đơn đặt hàng', 'object'=>$object,'objectTransaction'=>$objectTransaction];

        $pdf                = PDF::loadView('backend.transaction-user.bill', $data);
        return $pdf->download('Hoa-don-'.date('d-m-Y').'.pdf')  ;
    }

    public function getListUserTransactionNoAccount(Request $request){
        $param              = $request->all();
        $mTransaction       = new TransactionTable() ;
        $listTransaction    = $mTransaction->getTransaction2($param);
        return view('backend.transaction.index', [
            'object'=>$listTransaction,
            'title'=>'Danh sách khách vãng lai giao dịch ',
            'param'=>$param
        ]);
    }
    public function getDetailUserTransactionNoAccount($id){
        $mOrder             = new OrderTable();
        $object             = $mOrder->getDetailTransactionUser($id);
        $mTransaction       = new TransactionTable() ;
        $objectTransaction  = $mTransaction->getItemTransaction2($id) ;
        return view('backend.transaction.detail', ['object'=>$object, 'title'=>'Chi tiết đơn đặt hàng','objectTransaction'=>$objectTransaction]);

    }

}