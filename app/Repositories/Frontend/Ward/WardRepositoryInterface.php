<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 25/04/2018
 * Time: 1:38 SA
 */

namespace App\Repositories\Frontend\Ward;


interface WardRepositoryInterface
{

    public function getWardOption();
    public function getWardOptionIdDistrict($idDistrict);
}