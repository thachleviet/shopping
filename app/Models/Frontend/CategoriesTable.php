<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 13/03/2018
 * Time: 12:34 SA
 */

namespace App\Models\Frontend;


use Illuminate\Database\Eloquent\Model;

class CategoriesTable extends  Model
{
    public    $timestamps = false;
    protected $table        = 'categories' ;
    protected $primaryKey   = 'category_id';
    protected $fillable     = ['category_id', 'category_name', 'category_parent_id', 'category_ordering', 'category_created_at', 'category_created_by', 'category_update_at', 'category_update_by', 'category_status'];

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

    /*
     * function getCategoryMenu
     * author Le Viet Thach
     * 15/04/2018
     */
    public function getCategoryMenu($level){
        $oSelect  = $this->from($this->table)
            ->select('category_name', $this->primaryKey , 'category_parent_id', 'category_ordering','category_type')->where('category_level' , $level)
            ->orderBy($this->primaryKey, 'asc');
        return $oSelect->get()->toArray();
    }

    public function checkCategoryLevel($id, $level){
        $oSelect  = $this->from($this->table)
            ->where('category_level' , $level)
            ->where('category_id' , $id)->count();
        return $oSelect;
    }

    public function countIdParentOfId($id){
        return $this->where('category_parent_id', $id)->count();
    }

    public function getListCategory($idCategory){
        return $this->where($this->primaryKey,$idCategory)->get();
    }

    public function getListCategoryLevel($column, $option){
        return $this->whereIn($column,$option)->get();
    }

    public function search($param){
        $oSelect  = $this->select(
            'product_id',
            'product_description',
            'product_name',
            'product_category_id',
            'product_producer_id',
            'product_name_alias',
            'product_price',
            'product_status',
            'product_status_row',
            'product_image',
            'product_image_intro',
            'product_code',
            'product_color',
            'product_material',
            'product_type_designs',
            'product_suitable',
            'product_content',
            'product_created_at',
            'product_created_by',
            'product_modified_by',
            'product_modified_at',
            'product_count',
            'product_rate',
            'product_is_new',
            'product_number')
            ->from('products as p')
            ->join($this->table.' as c','c.category_id', '=', 'p.product_category_id')
            ->where('category_name', 'like', '%' . $param . '%');
        return $oSelect->get() ;
    }
}