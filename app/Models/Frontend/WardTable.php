<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 23/04/2018
 * Time: 7:31 CH
 */

namespace App\Models\Frontend;


use Illuminate\Database\Eloquent\Model;

class WardTable extends Model
{
    public      $timestamps = false;
    protected   $table = 'ward';
    protected   $primaryKey = 'ward_id';
    protected   $fillable = ['ward_id', 'name', 'type', 'location', 'district_id'];

    public function getWardOption(){
        return $this->pluck('name', 'ward_id')->toArray();
    }
    public function getWardOptionIdDistrict($idDistrict){
         if($idDistrict < 10){
             $idDistrict = '00'.$idDistrict;
         }
         if($idDistrict < 100 && $idDistrict >= 10) {
             $idDistrict = '0'.$idDistrict;
         }
        return $this->from($this->table)->where('district_id', $idDistrict)->get()->pluck('name','ward_id');
    }
}