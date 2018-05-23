<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 25/04/2018
 * Time: 7:06 CH
 */

namespace App\Models\Frontend;


use Illuminate\Database\Eloquent\Model;

class TransactionTable extends Model
{
    public      $timestamps = false;
    protected   $table = 'transaction';
    protected   $primaryKey = 'transaction_id';
    protected   $fillable = ['transaction_month','transaction_year','transaction_quy','transaction_id','transaction_from', 'transaction_user_id', 'ward_id', 'district_id', 'province_id', 'transaction_status', 'emai_customer', 'phone_customer', 'fullname_customer', 'address_customer', 'transaction_amount', 'transaction_type', 'transaction_note', 'created_at', 'update_at'];


    public function saveCart($params){
      $Object  =    $this->create($params);
      return $Object->transaction_id;
    }

    public function  getListHistoryOrderOfUser($filter,  $isPaging = true, $idUser){
            $oSelect  = $this->from($this->table.' as transaction')
                  ->select(
                     'transaction.transaction_status as transaction_status',
                     'transaction_type',
                     'transaction_user_id',
                     'transaction.created_at',
                     'transaction_id'
                 );
            $oSelect->where('transaction_user_id' ,$idUser);
            $oSelect->orderBy('transaction.created_at', 'desc');
            if ($isPaging) {
              return $oSelect->paginate(25);
            }else{
              return $oSelect->get();
            }
    }

}