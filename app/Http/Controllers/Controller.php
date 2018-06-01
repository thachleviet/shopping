<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function setResponse($boolean, $attributes = [], $option = []){
        return response()->json([
            'status'=>$boolean,
            'data'=>$attributes,
            'option'=>$option
        ]);
    }

    public function print_r($attribute){
        echo '<pre>';
        print_r($attribute);
        echo '</pre>';
        die();
    }

    public function var_dump($attribute){
        echo '<pre>';
        var_dump($attribute);
        echo '</pre>';
        die();
    }
}
