<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    protected $table = 'image_product' ;


    protected $fillable = ['product_menu_id','image_id', 'product_id', 'image_title', 'image_product', 'created_at', 'update_at'];


    public function getAll(){
        return $this->orderBy('id', 'desc')->paginate();
    }

    public function store(array  $attribute){
        return $this->insert($attribute);
    }

    public function getItem($id){
        return $this->where('id', $id)->first();
    }

    public function updates(array $attributes, $id)
    {

        return $this->where('id', (int)$id)->update($attributes);
    }

    public function destroys($id){
        return $this->where('id', (int)$id)->delete();
    }


    public function deleteIn($id)
    {
        return $this->where('product_id' , (int)$id)->delete();
    }

    public function getImageOfProduct($id){
        return $this->where('product_id', $id)->get();
    }

}
