<?php

namespace App\Repositories\Backend\News;


use App\Repositories\Backend\BackendRepository;

class NewsRepository extends BackendRepository implements NewsRepositoryInterface {

    protected $_model;


    function getModel(){
        return "App\Models\Backend\News" ;
    }

    public function thach(){
//        $this->_model->
    }
}