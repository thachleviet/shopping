<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 01/05/2018
 * Time: 8:53 CH
 */

namespace App\Repositories\Frontend\Order;


use App\Models\Frontend\OrderTable;

class OrderRepository implements OrderReposityInterface
{
    protected $order;
    public function __construct(OrderTable $orderTable)
    {
        $this->order = $orderTable;
    }
    public function getHistoryOrder(array $array){
       return $this->order->getHistoryOrder($array);
    }
}