<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 30/01/2018
 * Time: 5:54 PM
 */
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Product\ProductRepositoryInterface;
use App\Repositories\Frontend\Slider\SliderRepositoryInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class HomeController extends  Controller
{
    protected  $product;
    protected $slider;
	public function __construct(ProductRepositoryInterface $productRepository, SliderRepositoryInterface $sliderRepository)
	{

		$this->middleware('web');
		$this->slider   = $sliderRepository;
		$this->product  = $productRepository;
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function index(Request  $request){
        //SELECT SUM(count_order) FROM orders WHERE product_id = 33

		return view('frontend.home.index' ,[
		    'listSlider'        => $this->slider->getList(),
            'listProductNew'    => $this->product->getOptionListProduct(null, array())
        ]);
	}
}