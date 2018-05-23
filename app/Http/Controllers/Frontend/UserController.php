<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 30/04/2018
 * Time: 5:28 SA
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Order\OrderReposityInterface;
use App\Repositories\Frontend\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user ;
    protected $order;
    public function __construct(UserRepositoryInterface $userRepository ,OrderReposityInterface $orderReposity)
    {
        $this->middleware('web');
        $this->user  = $userRepository;
        $this->order = $orderReposity;
    }

    public function indexAction(){
        return view('frontend.user.index',[
            'object'=>$this->user->getInfoUser()
        ]);
    }

    public function infoAction()
    {
        return view('frontend.user.info',[
            'object'=>$this->user->getInfoUser()
        ]);
    }
    public function historyOrderAction(Request $request){
        // lấy danh sách lich sử đặt hàng
        $params             = $request->all();
        $selectTransaction  = $this->user->getListHistoryOrderOfUser($params, true, \Auth::user()->id) ;
        $userOrder          = $selectTransaction->pluck('transaction_id', 'transaction_id')->toArray();

        $arrDataOrDer       = $this->order->getHistoryOrder($userOrder) ;

        $arrUserChild       = $this->convertKeyProduct($arrDataOrDer, 'transaction_id');
        return view('frontend.user.history-order',[
          //  'status'                    => true,
            'listTransaction'           => $selectTransaction,
            'listOrderOfTransaction'    => $arrUserChild
        ]);
    }


    protected function convertKeyProduct($arrData, $key){
        $arrResult = [];

        foreach ($arrData as $data)
        {
            $arrResult[$data[$key]][$data['order_id']] = $data;
        }
        return $arrResult;
    }
}