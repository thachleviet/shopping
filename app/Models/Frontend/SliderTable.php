<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 22/04/2018
 * Time: 5:59 CH
 */

namespace App\Models\Frontend;


use Illuminate\Database\Eloquent\Model;

class SliderTable extends Model
{

        protected $table = 'slider' ;

        protected $primaryKey = 'slide_id';

    protected $fillable =['id', 'slider_name', 'slider_type',  'slider_image', 'slider_title', 'created_at', 'updated_at', 'slider_status'];

        public    $timestamps = false;


    public function getList($type){
    return $this->from($this->table)->where('slider_type', $type)->get();
    }

    public function getLogo(){
        return $this->from($this->table)->where('slider_type', 'logo')->first();
    }
    public function getQc(){
        return $this->from($this->table)->where('slider_type', 'qc')->first();
    }
    public function getItem($id){
        return $this->where($this->primaryKey, $id)->first();
    }



}