<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 24/05/2018
 * Time: 1:35 SA
 */

namespace App\Models\Backend;


use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{

    protected $table ='slider';
    protected $primaryKey = 'id';
    protected $fillable =['id', 'slider_image', 'slider_title', 'create_at', 'update_at', 'slider_status'];


    public function getAll(){
        return $this->paginate();
    }


    public function store(array $attribute){
        return $this->insert($attribute);
    }


    public function edit(array $attributes = [], array $options = [])
    {
        return $this->update($attributes, $options);
    }


}