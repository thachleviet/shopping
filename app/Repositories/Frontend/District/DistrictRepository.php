<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 25/04/2018
 * Time: 1:37 SA
 */

namespace App\Repositories\Frontend\District;




use App\Models\Frontend\DistrictTable;

class DistrictRepository implements DistrictRepositoryInterface
{
    protected $district ;
    public function __construct(DistrictTable $districtTable)
    {
        $this->district  = $districtTable;
    }

    public function getDistrictOption(){
        return $this->district->getDistrictOption();
    }

    public function getDistrictOptionIdProvince($idProvince){
        return $this->district->getDistrictOptionIdProvince($idProvince)->pluck('name','district_id')->toArray();
    }
}