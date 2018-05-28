<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    protected $table = 'image_product' ;


    protected $fillable = ['product_menu_id','image_id', 'product_id', 'image_title', 'image_product', 'created_at', 'update_at'];




    public function getImageOfProduct($id){
        return $this->where('product_id', $id)->get();
    }

}
