<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 13/03/2018
 * Time: 12:34 SA
 */

namespace App\Models\Backend;


use Illuminate\Database\Eloquent\Model;

class ProductsTable extends  Model
{
    public    $timestamps = false;
    protected $table        = 'products' ;
    protected $primaryKey   = 'product_id';
    protected $fillable     = ['product_id', 'product_description','product_name', 'product_category_id', 'product_producer_id', 'product_name_alias', 'product_price', 'product_status', 'product_status_row', 'product_image', 'product_image_intro', 'product_code', 'product_color', 'product_material', 'product_type_designs', 'product_suitable', 'product_content', 'product_created_at', 'product_created_by', 'product_modified_by', 'product_modified_at', 'product_count', 'product_rate', 'product_is_new', 'product_number','product_price_input'];

    public function getList(){
        $oSelect  = $this->from($this->table)
                    ->join('categories' , 'categories.category_id' , '=', 'products.product_category_id')
                    ->orderBy($this->primaryKey, 'desc');
        return      $oSelect->get();

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
        $oProduct =  $this->create($data);

        return $oProduct[$this->primaryKey] ;
    }

    public function edit(array $attributes ,$id)
    {

      return $this->where($this->primaryKey,(int)$id)->update($attributes);

    }


    public function getItem($id){
        return $this->where($this->primaryKey, $id)->first();
    }



    public function inventory($filter, $isPaging){
       $oSelect  =   $this->select(
                'product_name',
                        'product_number',
                        'created_at'
                    )
                    ->selectRaw('SUM(orders.count_order) as count_order')
                    ->from($this->table)
                    ->leftJoin('orders',
                        'orders.product_id', '=', $this->table.'.product_id'
                    )
                    ->groupBy('orders.product_id');
       if(isset($filter['search']) && !empty(trim($filter['search']))){
           $oSelect->where('product_name', 'like','%'.$filter['search'].'%');
       }

        if ($isPaging) {
            return $oSelect->paginate(12);
        }
        else {
            return $oSelect->get();
        }
    }

    public function countInventory(){
        return $this->sum('product_name');
    }
}