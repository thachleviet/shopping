<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 01/05/2018
 * Time: 8:53 CH
 */

namespace App\Repositories\Frontend\Order;


interface OrderReposityInterface
{
    public function getHistoryOrder(array $array);
}