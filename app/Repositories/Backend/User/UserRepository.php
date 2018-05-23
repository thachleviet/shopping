<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 09/05/2018
 * Time: 6:11 SA
 */

namespace App\Repositories\Backend\User;


use App\Models\Backend\UserTable;

class UserRepository implements UserRepositoryInterface
{
    protected $user ;
    public function __construct(UserTable  $userTable)
    {
        $this->user  = $userTable;
    }

    public function getListUser($param, $isPaging)
    {
        // TODO: Implement getListUser() method.
        return  $this->user->getListUser($param, $isPaging);
    }

    public function getDetail($id)
    {
        // TODO: Implement getDetail() method.
        return  $this->user->getDetail($id);
    }

    public function update($attribute, $id){
        return $this->user->edit($attribute,$id);
    }
}