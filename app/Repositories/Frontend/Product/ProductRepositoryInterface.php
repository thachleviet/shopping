<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 10/04/2018
 * Time: 12:16 SA
 */

namespace App\Repositories\Frontend\Product;


interface ProductRepositoryInterface
{


    public function getOptionListProduct($type , array $option);


    public function getItem($id);

    public function getListProductDiscount($type );

    public function getListProductSame($id) ;

    public function getListProductIdCategory($idCategory,$attribute,$isPaging);


    public function getListProduct();

    public function getListImageProduct($id);

    public function search($param);
}