<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product' ;


    protected $fillable = ['id', 'slug','product_keyword', 'product_menu_id', 'product_name','product_content', 'product_alias', 'product_image', 'product_price', 'product_discount', 'product_type','created_at', 'updated_at', 'product_status'];


    public function getAll(){
        return $this->select('p.id',
            'p.slug',
            'p.product_keyword',
            'p.product_menu_id',
            'p.product_name',
            'p.product_content',
            'p.product_alias',
            'p.product_image',
            'p.product_price',
            'p.product_discount',
            'p.product_type',
            'p.created_at',
            'p.updated_at',
            'p.product_status',
            'm.menu_name'
        )
        ->from($this->table.' as p')
        ->join('menu as m',
              'm.id','=',
            'p.product_menu_id'
        )
        ->orderBy('id', 'desc')
        ->paginate();
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

    public function deleteIn($id)
    {
        return $this->where('product_menu_id' , (int)$id)->delete();
    }

    public function getListItemIn($id){
        return $this->where('product_menu_id' , (int)$id)->get();
    }

}
