<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use Sluggable;

    protected $table = 'product' ;


    protected $fillable = ['id','product_keyword', 'product_menu_id','product_content', 'product_name', 'product_alias', 'product_image', 'product_price', 'product_discount', 'product_type','created_at', 'updated_at', 'product_status'];



    public function getItem($id){
        return $this->select(
            'product_keyword',
                    'menu_name',
                    'product_menu_id',
                    'product_discount',
                    'product_type',
                    'product.id as product_id', 'product_menu_id','product_content', 'product_name', 'product_alias', 'product_image', 'product_price', 'product_discount', 'product.created_at', 'product.updated_at', 'product_status')
            ->join('menu','menu.id' , '=', 'product.product_menu_id')
            ->where('product.id', $id)->first();
    }


    public function sluggable()
    {

        return [
            'slug' =>[
                'source' => ['product.product_name','title','id']
            ]
        ];
    }

    // Product Related
    public function related($menu, $id, $param){

        return $this
            ->where('product_menu_id',$menu)->where('product.product_type'  , $param)->where('product.id'  ,'<>', $id)->get();
    }



    public function getListItem(){
        return $this->orderBy('created_at', 'desc')->limit(8)->get();
    }

    public function getListItemType($type,$attribute, $isPagination){

        $oSelect =   $this->select(
            'product_keyword',
            'product.id',
            'product_menu_id',
            'product_discount',
            'product_type',
            'product.id as product_id', 'product_menu_id','product_content', 'product_name', 'product_alias', 'product_image', 'product_price', 'product_discount', 'product.created_at', 'product.updated_at', 'product_status')
            ->where('product_type',$type)->where('product_status', 1);
            if($isPagination){

                return $oSelect->paginate($attribute['limit']);
            }
        $oSelect->where('product_status', 1);
        return $oSelect->limit($attribute['limit'])->get();
    }
    public function getListItemOfIdMenu($type, $attribute, $isPagination){
        $oSelect =  $this->select(
            'product.id',
            'product_keyword',
            'menu_name',
            'product_menu_id',
            'product_discount',
            'product_type',
            'product.id as product_id', 'product_menu_id','product_content', 'product_name', 'product_alias', 'product_image', 'product_price', 'product_discount', 'product.created_at', 'product.updated_at', 'product_status')
            ->join('menu','menu.id' , '=', 'product.product_menu_id')
            ->where('product_status', 1)
            ->orderBy('created_at', 'desc')->where('product_menu_id',$type);
        if($isPagination){

            return $oSelect->paginate($attribute['limit']);
        }
        return $oSelect->get();
    }

    // lấy danh sách giảm giá
    public function getListItemDiscount(){
        return $this->orderBy('created_at', 'desc')->where('product_discount', '>',0)->limit(8)->get();
    }

    // lay san pham ban chay


    public function getListProductPay(){
        $oSelect =  $this->select(
            'product.id',
            'product_menu_id',
            'product_discount',
            'product_type',
            'product.id as product_id', 'product_menu_id','product_content', 'product_name', 'product_alias', 'product_image', 'product_price', 'product_discount', 'product.created_at', 'product.updated_at', 'product_status')
            ->where('product_status', 1)
            ->join(DB::raw('(SELECT transaction.transaction_status, COUNT(product_id) as count_product , `order`.product_id as order_product_id ,transaction_id
                                FROM `order` JOIN `transaction` on transaction.id = `order`.transaction_id 
                                WHERE transaction_status = 1 GROUP  BY order_product_id) as o'),function ($join){
                    $join->on('o.order_product_id', '=', 'product.id');

            } );
        $oSelect->where('o.transaction_status',1);
        $oSelect->orderBy('count_product', 'asc');
        return $oSelect->get() ;
    }


    public function search($param, $attribute, $isPagination){

        $oSelect =  $this->where('product_name', 'like', '%' . $param . '%');

        if($isPagination){

            return $oSelect->paginate($attribute['limit']);
        }
        return $oSelect->get();
    }
}
