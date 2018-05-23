<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 10/04/2018
 * Time: 12:16 SA
 */

namespace App\Repositories\Frontend\Slider;


interface SliderRepositoryInterface
{


    public function getList();


    public function getItem($id);
}