<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 23/04/2018
 * Time: 7:31 CH
 */

namespace App\Models\Frontend;


use Illuminate\Database\Eloquent\Model;

class ProvinceTable extends Model
{

    public      $timestamps = false;
    protected   $primaryKey = 'province_id';
    protected   $table      = 'province';
    protected   $fillable   = ['province_id', 'name', 'type', 'location_id'];

    public function getProvinceOption(){
        return $this->from($this->table)->get();
    }
}