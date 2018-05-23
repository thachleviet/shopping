<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 05/05/2018
 * Time: 4:42 CH
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Repositories\Frontend\District\DistrictRepositoryInterface;
use App\Repositories\Frontend\Ward\WardRepositoryInterface;
use Illuminate\Http\Request;


class AddressController extends Controller
{

    protected $district;
    protected $ward;
    public function __construct(DistrictRepositoryInterface $districtRepository, WardRepositoryInterface $wardRepository)
    {
        $this->district     = $districtRepository;
        $this->ward         = $wardRepository;
    }

    public function getDistrict(Request $request){

        $str = "";
        $data = $request->all();


        if(isset($data['province_id']) && !empty($data['province_id'])) {
            $listDistrict = $this->district->getDistrictOptionIdProvince($data['province_id']);
            foreach ($listDistrict as $k => $v) {
                $str .= sprintf('<option value="%s">%s</option>', $k, $v);
            }
        }else{
            $str = sprintf('<option value="">Quận/ Huyện</option>');
        }

        return $str;
    }

    public function getWard(Request $request){

        $str = "";
        $data = $request->all();
        if(isset($data['district_id']) && !empty($data['district_id'])) {
            $listWard = $this->ward->getWardOptionIdDistrict($data['district_id']);
            foreach ($listWard as $k => $v) {
                $str .= sprintf('<option value="%s">%s</option>', $k, $v);
            }
        }else{
            $str = sprintf('<option value="">Xã/ Phường</option>');
        }

        return $str;
    }

}