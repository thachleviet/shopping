<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 29/01/2018
 * Time: 11:52 PM
 */
namespace App\Http\Controllers\Backend ;
use App\Http\Controllers\Controller;
use App\Models\Backend\TransactionTable;
use App\Repositories\Backend\Category\CategoryRepositoryInterface;
use App\Repositories\Backend\Order\OrderRepositoryInterface;
use App\Repositories\Backend\Product\ProductRepositoryInterface;

class HomeController extends Controller
{
    protected $category;
    protected $product;
    protected $order;
	public function __construct()
	{
		$this->middleware('auth:admin');
	}

	public function indexAction(){
		$title = 'Trang chủ ' ;
		return view('backend.home.index' ,array(
		    'object'=>$title,
            'totalTransaction'=>0
        ));
	}

}