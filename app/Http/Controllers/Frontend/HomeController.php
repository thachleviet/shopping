<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 27/05/2018
 * Time: 6:09 CH
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;

class HomeController extends  Controller
{


    public function index(){


        return view('frontend.home.index');
    }
}