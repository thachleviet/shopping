<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 23/05/2018
 * Time: 11:51 CH
 */

namespace App\Models\Frontend;


use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    protected $table = 'menu';
    protected $fillable = ['id', 'menu_name', 'menu_level', 'menu_status', 'menu_type', 'created_at', 'updated_at'];


    public function getListMenuType($type){
       return $this->where('menu_type', $type)->get();
    }

    public function getListMenuOfId($id){
        return $this->where('id', $id)->paginate(12);
    }

    public function getItem($id){
        return $this->where('id', $id)->first();
    }

}