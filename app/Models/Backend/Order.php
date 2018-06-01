<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 25/04/2018
 * Time: 7:06 CH
 */

namespace App\Models\Backend;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public      $timestamps = false;
    protected   $table      = 'order';
    protected   $primaryKey = 'id';
    protected   $fillable   = ['order_id', 'product_id', 'transaction_id', 'count_order', 'created_at', 'updated_at'];

    public function saveCart($params){
      $Object  =    $this->create($params);
      return   $Object->transaction_id;
    }
    /*
     *  Gio dịch của user có tài khoản
     */




    public function getDetailTransactionUser($id){
        $oSelect  = $this->from($this->table.' as o')
            ->join('transaction as t', 't.id' , '=', 'o.transaction_id')
            ->leftJoin('product as p', 'p.id' , '=', 'o.product_id')
            ->select(
                        'p.product_discount',
                'p.product_name' ,
                'p.product_price',
                'p.product_image',
                'o.count_order',
                'o.product_id',
                't.created_at as transaction_created_at',
                't.address_customer as address_customer',
                'o.transaction_id as transaction_id'
            );
//        $oSelect
        //number_format(($_object['product_price']*(100 - $_object['product_discount'])/100),2)
        $oSelect->selectRaw('(o.count_order*p.product_price) as total_product');
//        $oSelect->selectRaw('(SUM(o.count_order*p.product_price)) as total_pay');
        $oSelect->selectRaw('(SUM(o.count_order*p.product_price)) as total_pay1');
        $oSelect->selectRaw('(SUM(o.count_order*(p.product_price*100 - product_discount)/100)) as total_pay');
        $oSelect->where('o.transaction_id', $id);
        $oSelect->groupBy('o.product_id');
        return $oSelect->get();
    }

    public function getRevenue(){
        $oSelect    =  $this->select('')->from($this->table.' as o');

        return $oSelect->get();

    }
}