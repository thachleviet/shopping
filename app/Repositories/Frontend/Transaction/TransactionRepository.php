<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 01/05/2018
 * Time: 7:20 CH
 */

namespace App\Repositories\Frontend\Transaction;


class TransactionRepository implements TransactionRepositoryInterface
{

    public function __construct()
    {
    }

    public  function getListHistoryOrderOfUser(){
        return  $this->user->getListHistoryOrderOfUser(\Auth::user()->id);
    }
}