<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 01/06/2018
 * Time: 6:48 SA
 */

namespace App\Models\Frontend;


use Illuminate\Database\Eloquent\Model;

class Config extends Model
{


    protected $table ='configs';
    protected $fillable =['id', 'phone', 'address','link_fanpage', 'header', 'footer', 'time_open','created_at', 'updated_at'];

    public function getALl(){
        return $this->first();
    }
}