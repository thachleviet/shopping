<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 25/04/2018
 * Time: 7:06 CH
 */

namespace App\Models\Backend;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TransactionTable extends Model
{
    public      $timestamps = false;
    protected   $table      = 'transaction';
    protected   $primaryKey = 'transaction_id';
    protected   $fillable   = ['transaction_month','transaction_year','transaction_quy','transaction_id','transaction_from', 'transaction_user_id', 'ward_id', 'district_id', 'province_id', 'transaction_status', 'emai_customer', 'phone_customer', 'fullname_customer', 'address_customer', 'transaction_amount', 'transaction_type', 'transaction_note', 'created_at', 'update_at'];

    public function saveCart($params){
      $Object  =    $this->create($params);
      return   $Object->transaction_id;
    }
    /*
     *  Gio dịch của user có tài khoản
     */

    public function getTransaction($filter , $isPaging = true){
       $oSelect  = $this->from($this->table.' as transaction')
//            ->join('orders', 'orders.transaction_id', '=', 'transaction.'.$this->primaryKey)
            ->join('users', 'users.id' , '=', 'transaction.transaction_user_id');
            $oSelect->leftJoin('province', 'province.province_id', '=', 'users.province_id');
            $oSelect->leftJoin('district', 'district.district_id', '=', 'users.district_id');
            $oSelect->leftJoin('ward', 'ward.ward_id', '=', 'users.ward_id')
            ->select(
                'users.name as user_name' ,
                        'users.email as user_email',
                        'users.phone as user_phone',
                        'users.address as user_address',
                        'transaction.transaction_status as transaction_status',
                        'users.gender as user_gender',
                        'facebook_email',
                        'facebook_name',
                        'users.type as users_type',
                        'transaction.transaction_id as transaction_id',
                        'transaction_type',
                        'ward.name as ward_name',
                        'district.name as district_name',
                        'province.name as city_name',
                        'transaction.created_at as transaction_created_at',
                        'transaction.transaction_id as transaction_id',
                        'transaction.transaction_user_id as transaction_user_id'
            );
        $oSelect->where('transaction_from', 'account');
        if ($isPaging) {
            return $oSelect->paginate(10);
        }
        else {
            return $oSelect->get();
        }
    }

    public function updateTransaction($attributes ,$id)
    {
        return $this->where('transaction_id',(int)$id)->update($attributes);
    }

    public function getItemTransaction($id){
        return $this->select(
            'transaction.transaction_id',
                    'users.email',
                    'users.phone',
                    'users.name',
                    'users.address as address',
                    'ward.name as ward_name',
                    'district.name as district_name',
                    'province.name as city_name',
                    'transaction.address_customer'
                    )->from($this->table.' as transaction')
                    ->join(
                        'users',
                        'users.id' , '=', 'transaction.transaction_user_id'
                    )
                    ->leftJoin(
                        'province',
                        'province.province_id', '=', 'users.province_id'
                    )
                    ->leftJoin(
                        'district',
                        'district.district_id','=', 'users.district_id'
                    )
                    ->leftJoin(
                        'ward',
                        'ward.ward_id', '=', 'users.ward_id'
                    )
                    ->where('transaction.transaction_id', $id)->first();
    }
    public function getItemTransaction2($id){
        return $this->select(
            'phone_customer',
            'email_customer',
            'fullname_customer',
            'address_customer',
            't.transaction_status as transaction_status',
            'transaction_type',
            'transaction_amount',
            't.created_at as transaction_created_at',
            't.transaction_id as transaction_id',
            't.transaction_user_id as transaction_user_id',
            'ward.name as ward_name',
            'district.name as district_name',
            'province.name as city_name'
        )->from($this->table.' as t')
            ->leftJoin(
                'province',
                'province.province_id', '=', 't.province_id'
            )
            ->leftJoin(
                'district',
                'district.district_id','=', 't.district_id'
            )
            ->leftJoin(
                'ward',
                'ward.ward_id', '=', 't.ward_id'
            )
            ->where('t.transaction_id', $id)->first();
    }

    public function getTransaction2($filter , $isPaging = true){
        $oSelect  = $this->from($this->table.' as transaction')
            ->select(
                'phone_customer',
                'email_customer',
                'fullname_customer',
                'address_customer',
                'transaction.transaction_status as transaction_status',
                'transaction_type',
                'transaction_amount',
                'transaction.created_at as transaction_created_at',
                'transaction.transaction_id as transaction_id',
                'transaction.transaction_user_id as transaction_user_id'
            );
        $oSelect->where('transaction_from', 'orther');
        if ($isPaging) {
            return $oSelect->paginate(10);
        }
        else {
            return $oSelect->get();
        }
    }



    public function getDetailTransactionUser($filter , $isPaging = true){
        $oSelect  = $this->from($this->table.' as o')
            ->leftJoin('orders as o', 'o.transaction_id', '=', 't.'.$this->primaryKey)
            ->join('users as u', 'u.id' , '=', 'o.user_id')

            ->select(

                'u.name as user_name' ,
                'u.email as user_email',
                'u.phone as user_phone',
                'u.address as user_address',
                't.transaction_status as transaction_status',
                'u.gender as user_gender',
                'u.type as users_type',
                't.transaction_id as transaction_id',
                't.transaction_type',
                't.created_at as transaction_created_at',
                't.transaction_id as transaction_id',
                't.transaction_user_id as transaction_user_id'

            );
        $oSelect->groupBy('user_id');
        if ($isPaging) {
            return $oSelect->paginate(10);
        }
        else {
            return $oSelect->get();
        }

    }

    public function revenue($filter, $isPaging){
       $oSelect  = $this->select(
           'created_at',
           'transaction_month',
           'transaction_quy',
           'transaction_year',
           'transaction.transaction_id'
       )->from($this->table.' as transaction')->leftJoin(
       DB::raw('(SELECT transaction_id, count_order * p.product_price_input as total_product_input,count_order *`p`.`product_price` as total_product_out 
                FROM `orders` JOIN `products` as p on p.product_id = orders.product_id) as dt'),
       function ($join){
           $join->on('dt.transaction_id', '=', 'transaction.transaction_id');
       })
       ->selectRaw('SUM(transaction_amount) as total_amount')
       ->selectRaw('SUM(dt.total_product_input) as total_input')
       ->selectRaw('SUM(dt.total_product_out) as total_out');
//        $oSelect->where('transaction.transaction_status', 1);
       if(isset($filter['transaction_month']) && $filter['transaction_month'] != 'all'){
           $oSelect->where($this->table.'.transaction_month', $filter['transaction_month']);
       }
        if(!empty($filter['transaction_quy']) && $filter['transaction_quy'] != 'all'){
            $oSelect->where($this->table.'.transaction_quy', $filter['transaction_quy']);
        }
        if(isset($filter['transaction_year']) && $filter['transaction_year'] != 'all'){
            $oSelect->where($this->table.'.transaction_quy', $filter['transaction_year']);
        }
        if ($isPaging) {
            return $oSelect->paginate(25);
        }
        else {
            return $oSelect->get();
        }
    }


    public function countTransaction(){
        return $this->count('transaction_id');
    }
}