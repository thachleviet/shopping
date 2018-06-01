<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 01/06/2018
 * Time: 6:47 SA
 */

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\Backend\Config;
use Illuminate\Http\Request;

class ConfigController extends  Controller
{
    protected $_config ;
    public function __construct(Config $config)
    {
        $this->_config  = $config;
    }

    public function index(){

        return view('backend.config.index', [
            '_object'=> $this->_config->getALl(),
            '_title'=> "Cấu hình"
        ]);
    }

    public function edit($id){
        $mConfig    = new Config();

        return view('backend.config.edit', ['_object'=>$mConfig->getItem($id), '_title'=>"Cập nhật cấu hình trang"]);
    }

    public function update(Request $request, $id)
    {
        try{
            $param  = $request->all();
            unset($param['_token']);
            if($this->_config->updates($param, $id)){
                $request->session()->flash('message_success', 'Cập nhật dữ liệu thành công');
                return redirect()->route('config');
            }
        }catch (\Exception $exception){
            $request->session()->flash('message_warning', 'Đã xãy ra lỗi');
        }
        return redirect()->route('config.edit',$id);
    }
}