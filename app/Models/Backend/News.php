<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 20/05/2018
 * Time: 9:35 CH
 */

namespace App\Models\Backend;


use Illuminate\Database\Eloquent\Model;

class News extends Model
{
        protected $table    = 'products';
        protected $fillable = ['*'];
        function getList(){
             return $this->from($this->table)->get();
        }
}