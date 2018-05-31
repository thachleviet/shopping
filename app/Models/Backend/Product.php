<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product' ;


    protected $fillable = ['id', 'product_menu_id', 'product_name','product_content', 'product_alias', 'product_image', 'product_price', 'product_discount', 'product_type','created_at', 'updated_at', 'product_status'];


    public function getAll(){
        return $this->orderBy('id', 'desc')->paginate();
    }

    public function store(array  $attribute){
        return $this->create($attribute);
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



}
