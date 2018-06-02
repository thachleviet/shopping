<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 23/05/2018
 * Time: 11:51 CH
 */

namespace App\Models\Backend;


use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    protected $table = 'menu';
    protected $fillable = ['id','slug', 'menu_name', 'menu_level', 'menu_status', 'menu_type', 'created_at', 'updated_at'];


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

        return $this->where('id', (int)$id)->update($attributes); // TODO: Change the autogenerated stub
    }

    public function destroys($id){
        return $this->where('id', (int)$id)->delete();
    }

    public function getListMenuOfProduct($type){
        return $this->from($this->table)->where('menu_status', 1)->where('menu_type', $type)->get()->pluck('menu_name', 'id');
    }


}