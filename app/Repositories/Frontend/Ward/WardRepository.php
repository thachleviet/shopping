<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 25/04/2018
 * Time: 1:37 SA
 */

namespace App\Repositories\Frontend\Ward;




use App\Models\Frontend\WardTable;

class WardRepository implements WardRepositoryInterface
{
    protected $ward;
    public function __construct(WardTable $wardTable)
    {
        $this->ward = $wardTable;
    }

    public function getWardOption(){
        return $this->ward->getWardOption();
    }

    public function getWardOptionIdDistrict($idProvince){
        return $this->ward->getWardOptionIdDistrict($idProvince)->pluck('name','ward_id')->toArray();
    }
}