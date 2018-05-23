<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 30/04/2018
 * Time: 3:19 SA
 */

namespace App\Models\Backend;


use App\Http\Controllers\Controller;

class UserController extends  Controller
{
    public function __construct()
    {
        $this->middleware('guest') ;
    }

    public function indexAction(){


        return view('frontend.user.index') ;
    }

    public function historyOrderAction(){


        return view('frontend.user.history-order') ;
    }
}