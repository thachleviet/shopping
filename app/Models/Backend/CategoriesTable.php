<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 13/03/2018
 * Time: 12:34 SA
 */

namespace App\Models\Backend;


use Illuminate\Database\Eloquent\Model;

class CategoriesTable extends  Model
{
    public    $timestamps = false;
    protected $table        = 'categories' ;
    protected $primaryKey   = 'category_id';
    protected $fillable     = ['category_id', 'category_type', 'category_level',  'category_name', 'category_parent_id', 'category_ordering', 'category_created_at', 'category_created_by', 'category_update_at', 'category_update_by', 'category_status'];

    public function getList(){
        $oSelect  = $this->from($this->table)
                ->leftjoin('admins', 'admins.id' , '=', $this->table.'.category_created_by')
                ->select(
                    'admins.name as name_admin',
                    'categories.category_name' ,'category_id',
                    'category_parent_id',
                    'categories.category_ordering',
                    'categories.category_created_at',
                    'categories.category_created_by',
                    'categories.category_update_at',
                    'categories.category_update_by',
                    'category_status'
                )
                ->orderBy($this->primaryKey, 'desc');
        return $oSelect->get()->toArray();

    }
    public function deleteItem($id)
    {
        return $this->find($id)->delete();
    }
    public function deleteItemMulti(array $attribute){

        return $this->whereIn('category_id',$attribute['data'])->delete();
    }
    public function add(array  $data)
    {
        $oCategory =  $this->create($data);
        return $oCategory->primaryKey ;
    }

    public function edit(array $attributes ,$id)
    {

      return $this->where('category_id',(int)$id)->update($attributes);

    }
    public function filterCategory($filter,$option = null){

        return $this->where('category_level',($filter - 1) )->get()->toArray();
    }
    public function getItem($id){
        return $this->where($this->primaryKey, $id)->first()->toArray();
    }

}