<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 25/04/2018
 * Time: 1:38 SA
 */

namespace App\Repositories\Frontend\District;


interface DistrictRepositoryInterface
{
    public function getDistrictOption();

    public function getDistrictOptionIdProvince($idProvince);
}