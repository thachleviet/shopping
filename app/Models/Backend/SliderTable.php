<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 22/04/2018
 * Time: 5:59 CH
 */

namespace App\Models\Backend;


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

        public function deleteItem($id)
        {
            return $this->find($id)->delete();
        }
        public function deleteItemMulti(array $attribute){

            return $this->whereIn($this->primaryKey,$attribute['data'])->delete();
        }
        public function add(array  $data)
        {

            $oSlider =  $this->create($data);

            return $oSlider[$this->primaryKey] ;
        }

        public function edit(array $attributes ,$id)
        {

            return $this->where($this->primaryKey,(int)$id)->update($attributes);

        }


        public function getItem($id){
            return $this->where($this->primaryKey, $id)->first()->toArray();
        }
}