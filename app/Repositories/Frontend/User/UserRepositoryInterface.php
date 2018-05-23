<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 30/04/2018
 * Time: 5:30 SA
 */

namespace App\Repositories\Frontend\User;


interface UserRepositoryInterface
{
  public  function getInfoUser();


  public  function getListHistoryOrderOfUser(array $array, $pagination , $id);
}