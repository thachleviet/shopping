<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 27/05/2018
 * Time: 12:48 CH
 */

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\Backend\AttributeProduct;

class AttributeController extends  Controller
{
    protected $_attribute;
    public function __construct()
    {
        $this->_attribute  = new AttributeProduct();
    }

    public function destroy($id){
        try{
            if($this->_attribute->destroys($id)){
                return  $this->setResponse(true,null, ['messages'=>'Xóa dữ liệu thành công !']) ;
            }
        }catch(\Exception $exception){
            return $this->setResponse(false,null, ['messages'=>'Đã xảy ra lỗi']) ;
        }
        return $this->setResponse(false,null, ['messages'=>'Đã xảy ra lỗi']) ;
    }
}