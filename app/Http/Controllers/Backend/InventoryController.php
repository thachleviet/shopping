<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 08/05/2018
 * Time: 9:49 CH
 */

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Repositories\Backend\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    protected $product;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->middleware('auth:admin');
        $this->product  = $productRepository;
    }

    public function indexAction(Request $request){
        $param  = $request->all();
        $title  = 'Thống kê hàng tồn';
        $object = $this->product->inventory($param,true);

        return view('backend.inventory.index', ['title'=>$title, 'param'=>$param,'object'=>$object]);
    }
}