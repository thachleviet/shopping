<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 30/04/2018
 * Time: 5:30 SA
 */

namespace App\Repositories\Frontend\User;


use App\Models\Frontend\TransactionTable;
use App\Models\Frontend\UserTable;

class UserRepository implements UserRepositoryInterface
{
    protected $user;
    protected $transaction;
    public function __construct(UserTable $userTable, TransactionTable $transactionTable)
    {
        $this->user         = $userTable;
        $this->transaction  = $transactionTable;
    }

    public  function getInfoUser(){
      return  $this->user->getInfoUser(\Auth::user()->id);
    }

    public  function getListHistoryOrderOfUser(array $array , $pagination, $id){
        return  $this->transaction->getListHistoryOrderOfUser($array, $pagination, $id);
    }
}