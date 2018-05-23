<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 21/04/2018
 * Time: 11:54 CH
 */

namespace App\Repositories\Frontend\Product;


use App\Models\Frontend\ProductTable;

class ProductRepository implements ProductRepositoryInterface
{
    protected $product;
    public function __construct(ProductTable $productTable)
    {
        $this->product = $productTable;
    }

    public function getOptionListProduct($type ,array $option){
        return $this->product->getOptionListProduct($type ,$option);
    }

    public function getListProductDiscount($type){
        return $this->product->getListProductDiscount($type);
    }

    public function getListProductSame($id){
       return $this->product->getListProductSame($id) ;
    }
    public function getItem($id)
    {
        // TODO: Implement getItem() method.

      return  $this->product->getItem($id);
    }

    public function getListProductIdCategory($idCategory ,$attribute,$isPaging){
        return  $this->product->getListProductIdCategory($idCategory,$attribute,$isPaging);
    }

    public function getListProduct(){
        return  $this->product->getListProduct();
    }


    public function getListImageProduct($id){
        return  $this->product->getListImageProduct($id);
    }

    public function search($param){

    }
}