<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 09/05/2018
 * Time: 6:12 SA
 */

namespace App\Repositories\Backend\User;


interface UserRepositoryInterface
{
    public function getListUser($param ,$isPaging);


    public function getDetail($id);

    public function update($attribute,$id) ;
}