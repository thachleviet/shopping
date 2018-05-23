<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 09/05/2018
 * Time: 6:11 SA
 */

namespace App\Repositories\Backend\Order;



use App\Models\Backend\OrderTable;

class OrderRepository implements OrderRepositoryInterface
{
    protected $order;
    public function __construct(OrderTable $orderTable)
    {
        $this->order  = $orderTable;
    }

    public function countInventory()
    {
        // TODO: Implement countInventory() method.
        return $this->order->countInventory();
    }
}