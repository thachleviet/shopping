<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 21/04/2018
 * Time: 11:54 CH
 */

namespace App\Repositories\Frontend\Slider;


use App\Models\Frontend\SliderTable;

class SliderRepository implements SliderRepositoryInterface
{
    protected $slider;
    public function __construct(SliderTable $sliderTable)
    {
        $this->slider = $sliderTable;
    }

    public function getList(){
        return $this->slider->getList();
    }


    public function getItem($id)
    {
        // TODO: Implement getItem() method.

      return  $this->slider->getItem($id);
    }

}