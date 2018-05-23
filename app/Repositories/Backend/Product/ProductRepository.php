<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 10/04/2018
 * Time: 12:17 SA
 */

namespace App\Repositories\Backend\Product;



use App\Models\Backend\ProductsTable;

class ProductRepository  implements ProductRepositoryInterface
{
    protected  $product;

    public function __construct(ProductsTable $categoriesTable)
    {
        $this->product = $categoriesTable;
    }

    public function listItem(){
        return $this->product->getList();
    }

    public function add(array  $attributes)
    {
        // TODO: Implement create() method.
        return  $this->product->add($attributes);
    }

    public function getItem($id)
    {
        return $this->product->getItem($id);// TODO: Implement getItem() method.
    }

    public function update(array $attributes,array $option )
    {
        // TODO: Implement update() method.

        switch ($option['action']){
            case 'edit' :
                $attributes['product_status']  = $attributes['is_active'] ;

                unset($attributes['is_active']);

                $this->product->edit($attributes,$attributes['product_id']);

                return $attributes['product_id'] ;

                break ;
            case 'change-status':
                $attributes['product_status']  = ($attributes['product_status'] == 0)? 1 : 0;
                $this->product->edit($attributes,$attributes['product_id']);
                return $attributes['product_status'];
            default :
                break;
        }
        return false ;
    }

    public function deleteItem($id)
    {
        return $this->product->deleteItem($id); // TODO: Implement delete() method.
    }

    public function deleteItemMulti(array $attributes)
    {
        return $this->product->deleteItemMulti($attributes);// TODO: Implement deleteItemMulti() method.
    }

    public function inventory($filter, $isPaging){
        return $this->product->inventory($filter, $isPaging);
    }

    public function countInventory(){
        return $this->product->countInventory();
    }



}