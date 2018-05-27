<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 27/05/2018
 * Time: 12:48 CH
 */

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;

use App\Models\Backend\ImageProduct;

class ImageProductController extends  Controller
{
    protected $_imageProduct;
    public function __construct()
    {
        $this->_imageProduct  = new ImageProduct();
    }

    public function destroy($id){
        try{
            if($this->_imageProduct->destroys($id)){
                return  $this->setResponse(true,null, ['messages'=>'Xóa dữ liệu thành công !']) ;
            }
        }catch(\Exception $exception){
            return $this->setResponse(false,null, ['messages'=>'Đã xảy ra lỗi']) ;
        }
        return $this->setResponse(false,null, ['messages'=>'Đã xảy ra lỗi']) ;
    }
}