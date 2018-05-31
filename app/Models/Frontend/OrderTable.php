<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 25/04/2018
 * Time: 7:16 CH
 */

namespace App\Models\Frontend;


use Illuminate\Database\Eloquent\Model;

class OrderTable extends  Model
{
    public      $timestamps = false;
    protected   $table = 'order';
    protected   $primaryKey = 'order_id';
    protected   $fillable = ['order_id', 'product_id', 'transaction_id', 'count_order', 'created_at', 'updated_at'];


    public function countProductId($id){
        return $this->where('product_id', $id)->sum('count_order');

    }
    public function getHistoryOrder(array $array){
       return $this->from($this->table.' as orders')
                ->join('products', 'products.product_id', '=' , 'orders.product_id')
                ->select('order_id','transaction_id','user_id','count_order', 'products.product_name', 'product_price', 'product_image')
                 ->whereIn('orders.transaction_id', $array)->get()->toArray();
    }


}