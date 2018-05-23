<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 25/04/2018
 * Time: 2:47 SA
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;

use App\Repositories\Frontend\Ward\WardRepositoryInterface;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    protected $ward;

    public function __construct(WardRepositoryInterface $wardRepository)
    {
        $this->ward = $wardRepository;
    }

    public function indexAction(Request $request){
        return response()->json(['data'=>$this->ward->getWardOptionIdDistrict($request->input('district_id'))]);
    }
}