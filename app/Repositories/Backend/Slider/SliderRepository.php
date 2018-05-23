<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 10/04/2018
 * Time: 12:17 SA
 */

namespace App\Repositories\Backend\Slider;



use App\Models\Backend\SliderTable;

class SliderRepository  implements SliderRepositoryInterface
{
    protected  $slider;

    public function __construct(SliderTable $categoriesTable)
    {
        $this->slider = $categoriesTable;
    }

    public function listItem(){
        return $this->slider->getList();
    }

    public function add(array  $attributes)
    {

        // TODO: Implement create() method.
        return  $this->slider->add($attributes);
    }

    public function getItem($id)
    {
        return $this->slider->getItem($id);// TODO: Implement getItem() method.
    }

    public function update(array $attributes,array $option )
    {
        // TODO: Implement update() method.

        switch ($option['action']){
            case 'edit' :


                $this->slider->edit($attributes,$attributes['slide_id']);

                return $attributes['slide_id'] ;

                break ;
            case 'change-status':
                $attributes['slide_status']  = ($attributes['slider_status'] == 0)? 1 : 0;
                $this->slider->edit($attributes,$attributes['slide_id']);
                return $attributes['slider_status'];
            default :
                break;
        }
        return false ;
    }

    public function deleteItem($id)
    {
        return $this->slider->deleteItem($id); // TODO: Implement delete() method.
    }

    public function deleteItemMulti(array $attributes)
    {
        return $this->slider->deleteItemMulti($attributes);// TODO: Implement deleteItemMulti() method.
    }


}