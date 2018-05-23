<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 09/05/2018
 * Time: 2:10 CH
 */

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\Backend\TransactionTable;
use Illuminate\Http\Request;


class RevenueController  extends Controller
{
    protected $transaction;
    public function __construct(TransactionTable $transactionTable)
    {
        $this->middleware('auth:admin');
        $this->transaction = $transactionTable;
    }

    public function indexAction(Request $request){
        $param          =        $request->all();
        $oListRevenue  = $this->transaction->revenue($param, true);
        return view('backend.revenue.index', ['param'=>$param,'object'=>$oListRevenue, 'title'=>'Thông kê doanh thu']);
    }
}