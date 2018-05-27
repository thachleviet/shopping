<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class AttributeProduct extends Model
{
    protected $table = 'product_attribute' ;

    protected $primaryKey ='id';
    protected $fillable = ['id', 'product_id', 'key', 'value', 'created_at', 'updated_at'];


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

    public function getAttributeOfProduct($id){
        return $this->where('product_id', $id)->get();
    }
}
