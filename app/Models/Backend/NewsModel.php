<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    protected $table = 'news' ;
    protected $fillable = ['id', 'title', 'title-alias', 'content', 'created_at', 'update_at'];
    public $timestamps = false ;


    public function getAll(){
        return $this->get();
    }
}
