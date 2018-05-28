<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product' ;


    protected $fillable = ['id', 'product_menu_id','product_content', 'product_name', 'product_alias', 'product_image', 'product_price', 'product_discount', 'product_type','created_at', 'updated_at', 'product_status'];



    public function getItem($id){
        return $this->select(
                    'menu_name',
            'product_menu_id',
                    'product.id as product_id', 'product_menu_id','product_content', 'product_name', 'product_alias', 'product_image', 'product_price', 'product_discount', 'product_type','product.created_at', 'product.updated_at', 'product_status')
            ->join('menu','menu.id' , '=', 'product.product_menu_id')
            ->where('product.id', $id)->first();
    }


    // Product Related
    public function related($menu, $id){
        return $this->where('product.id'  ,'<>', $id)
            ->where('product_menu_id',$menu)->get();
    }



    public function getListItem(){
        return $this->orderBy('created_at', 'desc')->limit(8)->get();
    }
}
