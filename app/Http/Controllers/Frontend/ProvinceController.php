<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 25/04/2018
 * Time: 2:47 SA
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Frontend\DistrictTable;
use App\Repositories\Frontend\District\DistrictRepositoryInterface;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    protected $district;

    public function __construct()
    {
        $this->district = new DistrictTable();
    }

    public function indexAction(Request $request){

        return response()->json([
            'data'=> $this->district->getDistrictOptionIdProvince($request->input('province_id'))
        ]);
    }
}