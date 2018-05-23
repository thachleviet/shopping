<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 10/04/2018
 * Time: 12:17 SA
 */

namespace App\Repositories\Frontend\Category;



use App\Models\Frontend\CategoriesTable;
use App\Models\Frontend\ProductTable;
use App\Repositories\Frontend\Product\ProductRepositoryInterface;

class CategoryRepository  implements CategoryRepositoryInterface
{
    protected  $category;

    protected  $product;
    public function __construct(CategoriesTable $categoriesTable, ProductTable $productTable)
    {
        $this->category = $categoriesTable;
        $this->product  = $productTable;
    }

    public function listItem(){
        return $this->category->getList();
    }

    // get category menu
    public function getCategoryMenu($level){
        return $this->category->getCategoryMenu($level);
    }
    // check category level
    public function checkCategoryLevel($id , $level){
        return $this->category->checkCategoryLevel($id, $level);
    }

    public function getListCategory($idCategory,$attribute, $isPaging){
        return $this->product->getListProductIdCategory($idCategory, $attribute, $isPaging);
    }

    public function getListCategoryLevel($column, $option){
        return $this->category->getListCategoryLevel($column, $option);
    }

    public function search($param){
        $object         =  $this->category->search($param);
        if(empty($object)){
            $object     =  $this->product->search($param);
        }
        return $object ;
    }
}