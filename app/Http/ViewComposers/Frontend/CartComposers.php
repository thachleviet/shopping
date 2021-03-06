<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 29/05/2018
 * Time: 6:01 SA
 */

namespace App\Http\ViewComposers\Frontend;
use App\Models\Frontend\Config;
use App\Models\Frontend\SliderTable;
use  Gloudemans\Shoppingcart\Facades\Cart;


use Illuminate\View\View;
class CartComposers
{

    public function __construct()
    {
        // Dependencies automatically resolved by service container...

    }

    public function compose(View $view)
    {
        $mSlide  = new SliderTable() ;
        $mConfig = new Config() ;
        $view->with('listCart', Cart::content());
        $view->with('countCart', Cart::count());
        $view->with('totalCart', Cart::subTotal());
        $view->with('logo', $mSlide->getLogo());
        $view->with('config', $mConfig->getALl());
    }
}