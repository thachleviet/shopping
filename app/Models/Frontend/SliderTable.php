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

        protected $table = 'slides' ;

        protected $primaryKey = 'slide_id';

        protected $fillable = ['slide_id', 'slide_title', 'slide_name', 'slide_name_alias', 'slide_title_alias', 'slide_category_id', 'slide_product_id', 'slide_created_at', 'slide_created_by', 'slide_modified_at', 'slide_modified_by', 'slide_image'] ;

        public    $timestamps = false;


        public function getList(){
            return $this->from($this->table)->get();
        }


        public function getItem($id){
            return $this->where($this->primaryKey, $id)->first();
        }
}