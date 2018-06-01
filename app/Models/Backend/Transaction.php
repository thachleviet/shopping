<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 25/04/2018
 * Time: 7:06 CH
 */

namespace App\Models\Backend;


use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public      $timestamps = false;
    protected   $table = 'transaction';
    protected   $primaryKey = 'id';
    protected   $fillable = ['id', 'email_customer', 'phone_customer', 'fullname_customer', 'address_customer', 'transaction_amount', 'transaction_type', 'postcode_customer', 'transaction_note', 'ward_id', 'district_id', 'province_id', 'created_at', 'updated_at'];


    /*
      *  Gio dịch của user có tài khoản
      */

    public function updateTransaction($attributes ,$id)
    {
        return $this->where('id',(int)$id)->update($attributes);
    }

    public function getItemTransaction2($id){
        return $this->select(
            't.phone_customer',
            't.email_customer',
            't.fullname_customer',
            't.address_customer',
            't.transaction_status',
            't.transaction_type',
            't.transaction_amount',
            't.created_at as transaction_created_at',
            't.id as transaction_id',
            'ward.name as ward_name',
            'district.name as district_name',
            'province.name as city_name'
        )
            ->from($this->table.' as t')

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
            ->where('t.id', $id)
            ->first();
    }


    public function getTransaction2($filter , $isPaging = true){
        $oSelect  = $this->from($this->table.' as transaction')
            ->select(
                'phone_customer',
                'email_customer',
                'fullname_customer',
                'address_customer',
                'transaction.transaction_status as transaction_status',
                'transaction_amount',
                'transaction.created_at as transaction_created_at',
                'transaction.id as transaction_id'
            );

        if ($isPaging) {
            return $oSelect->paginate(10);
        }
        else {
            return $oSelect->get();
        }
    }

    public function countTransaction(){
        return $this->count('transaction_id');
    }

}