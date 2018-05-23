<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 22/04/2018
 * Time: 1:36 CH
 */

namespace App\Http\ViewComposers\Frontend;


use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\View\View;

class CartComposer
{

    public function indexAction(){

    }

    public function compose(View $view){
        $view->with('countItem',Cart::count());
        $view->with('totalItem',Cart::subtotal());
    }
}