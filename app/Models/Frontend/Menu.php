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
    public function search($param, $attribute, $isPagination){
        $oSelect  = $this->select('p.product_menu_id',
            'p.product_discount',
            'p.product_type',
            'p.product_menu_id',
            'p.product_content',
            'p.product_name',
            'p.product_alias',
            'p.product_image',
            'p.product_price',
            'p.product_discount',
            'p.product_status',
            'menu.id',
            'menu_name'
        )
        ->from('product as p')
        ->join($this->table.' as menu','menu.id', '=', 'p.product_menu_id')
        ->where('menu_name', 'like', '%' . $param . '%');
        if($isPagination){

            return $oSelect->paginate($attribute['limit']);
        }
        return $oSelect->get();
    }
}