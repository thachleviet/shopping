<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 31/05/2018
 * Time: 11:46 CH
 */

namespace App\Models\Frontend;


use Illuminate\Database\Eloquent\Model;

class News extends Model
{


    protected $table = 'new';

    protected $fillable = ['id',  'new_image', 'new_name', 'new_title', 'new_content', 'new_view_count', 'menu_id', 'new_status', 'new_type', 'created_at', 'updated_at'];

    public function getAll($param){
        return $this->orderBy('id', 'desc')->where('new_type', 'new')->paginate($param['limit']);
    }

    public function getItem($id){
        return $this->where('id', $id)->first();
    }


    public function getListRelated($param){
        return $this->orderBy('id', 'desc')->where('new_type', 'new')->where('id','<>', $param)->limit(4)->get();
    }
    public function getGuide(){
        return $this->where('new_type', 'guide')->first();
    }
}