<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 25/04/2018
 * Time: 1:37 SA
 */

namespace App\Repositories\Frontend\Province;



use App\Models\Frontend\ProvinceTable;

class ProvinceRepository implements ProvinceRepositoryInterface
{
    protected $province;
    public function __construct(ProvinceTable $provinceTable)
    {
        $this->province = $provinceTable;
    }

     public function getProvinceOption(){
         return $this->province->getProvinceOption()->pluck('name', 'province_id');
     }
}