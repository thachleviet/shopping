<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 25/04/2018
 * Time: 7:06 CH
 */

namespace App\Models\Backend;


use Illuminate\Database\Eloquent\Model;

class OrderTable extends Model
{
    public      $timestamps = false;
    protected   $table      = 'orders';
    protected   $primaryKey = 'order_id';
    protected   $fillable   = ['order_id', 'transaction_id', 'user_id', 'product_id', 'catecory_id', 'count_order', 'created_at'];

    public function saveCart($params){
      $Object  =    $this->create($params);
      return   $Object->transaction_id;
    }
    /*
     *  Gio dịch của user có tài khoản
     */




    public function getDetailTransactionUser($id){
        $oSelect  = $this->from($this->table.' as o')
            ->join('transaction as t', 't.transaction_id' , '=', 'o.transaction_id')
            ->leftJoin('products as p', 'p.product_id' , '=', 'o.product_id')
            ->select(
                'p.product_name' ,
                'p.product_price',
                'p.product_image',
                'o.count_order',
                'o.product_id',
                't.created_at as transaction_created_at',
                't.address_customer as address_customer',
                'o.transaction_id as transaction_id'
            );
        $oSelect->selectRaw('(o.count_order*p.product_price) as total_product');
        $oSelect->selectRaw('(SUM(o.count_order*p.product_price)) as total_pay');
        $oSelect->where('o.transaction_id', $id);
        $oSelect->groupBy('o.product_id');
        return $oSelect->get();
    }

    public function getRevenue(){
        $oSelect    =  $this->select('')->from($this->table.' as o');

        return $oSelect->get();

    }
}