<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 21/04/2018
 * Time: 11:56 CH
 */

namespace App\Models\Frontend;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ProductTable extends Model
{
    public    $timestamps = false;
    protected $table        = 'products' ;
    protected $primaryKey   = 'product_id';
    protected $fillable     = ['product_id', 'product_name', 'product_category_id', 'product_producer_id', 'product_name_alias', 'product_price', 'product_status', 'product_status_row', 'product_image', 'product_image_intro', 'product_code', 'product_color', 'product_material', 'product_type_designs', 'product_suitable', 'product_content', 'product_created_at', 'product_created_by', 'product_modified_by', 'product_modified_at', 'product_count', 'product_rate', 'product_is_new', 'product_number'];

    // get list option product
    public function getOptionListProduct($type, $option){
        $oSelect  = $this->from($this->table);
        $oSelect->whereBetween('product_created_at',
                [
                    date('Y-m-d', strtotime('-7 days',
                    strtotime( Carbon::now()))), Carbon::now()
                ])
                ->orWhere('product_is_new', 1);
        $oSelect->inRandomOrder();
        return  $oSelect->take(4)->get();
    }
    // get danh sách sản phẩm giảm giá
    public function getListProductDiscount($type ){
        $oSelect  = $this->from($this->table);
        $oSelect ->where($type, 1);
        $oSelect->inRandomOrder();
        return  $oSelect->take(4)->get();


    }
    // get danh sách sản phẩm cùng loại
    public function getListProductSame($id){
        $categoryId  = $this->getItem($id);
        $oSelect  = $this->from($this->table);
        $oSelect->where('product_category_id',$categoryId->product_category_id);
        $oSelect->whereNotIn($this->primaryKey, [$id]);
        $oSelect->inRandomOrder();
        return  $oSelect->take(4)->get();

    }
    // lấy chi sản phẩm
    public function getItem($id){
        return $this->where($this->primaryKey, $id)->first();
    }

    // lấy danh sách sản phẩm theo id thể laoij
    public function getListProductIdCategory($idCategory,$attribute,$isPaging){
        $oSelect =  $this->from($this->table)->where('product_category_id', $idCategory);
        if(isset($attribute['sort']) && !empty($attribute['sort'])){
             $oSelect->orderBy($this->table.'.product_price',$attribute['sort']);
        }
        if(isset($attribute['price']) && !empty($attribute['sort'])){
            $oSelect->orderBy($this->table.'.product_price',$attribute['sort']);
        }
        if((!empty($attribute['start_price']) && $attribute['start_price'] != 'all')   && (!empty($attribute['end_price']) && $attribute['end_price'] != 'all')){
            $from = $attribute['start_price'];
            $to   = $attribute['end_price'];
            if(isset($attribute['end_price']) == 'max'){
                $oSelect->where('product_price', '>=',$attribute['start_price']);
            }else{
                $oSelect->whereBetween('product_price', [$from,$to]);
            }

        }
        if($isPaging){

            return $oSelect->paginate($attribute['limit']);
        }
        return $oSelect->get();

    }
    // get danh sách sản phẩm
    public function getListProduct(){
        $oSelect  = $this->from($this->table);
        $oSelect->inRandomOrder();
        return  $oSelect->get();
    }

    public function countProductId($id){
        $oSelect  = $this->from($this->table);
    }
    public function  getListImageProduct($id){
        return $this->from('products')
            ->leftJoin('image_product', 'image_product.product_id', '=', 'products.product_id')
            ->select('image_product.image_product')->where('image_product.product_id', $id)->get()->toArray();
    }

    public function search($param){
        return $this->where('product_name', 'like', '%' . $param . '%')->get();
    }
}