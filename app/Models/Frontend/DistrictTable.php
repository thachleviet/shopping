<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 23/04/2018
 * Time: 7:31 CH
 */

namespace App\Models\Frontend;


use Illuminate\Database\Eloquent\Model;

class DistrictTable extends Model
{
    public      $timestamps = false;
    protected   $table = 'district';
    protected   $primaryKey = 'district_id';
    protected   $fillable = ['district_id', 'name', 'type', 'location', 'province_id'];

    public function getDistrictOption(){
        return $this->from($this->table)->get();
    }
    public function getDistrictOptionIdProvince($idProvince){
        if($idProvince < 10){
            $idProvince = '0'.$idProvince;
        }
        return $this->from($this->table)->where('province_id',$idProvince)->get()->pluck('name', 'district_id');
    }
}