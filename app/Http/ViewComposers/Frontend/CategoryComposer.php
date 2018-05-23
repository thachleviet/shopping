<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 15/04/2018
 * Time: 11:21 CH
 */

namespace App\Http\ViewComposers\Frontend;

use App\Repositories\Frontend\Category\CategoryRepository;
use Illuminate\Contracts\View\View;


class CategoryComposer
{
    protected $category;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->category = $categoryRepository ;
    }

    public function compose(View $view){
        $view->with('categoryMenuLevelOne', $this->category->getCategoryMenu(1));
        $view->with('categoryMenuLevelTwo', $this->category->getCategoryMenu(2));
        $view->with('categoryMenuLevelThree', $this->category->getCategoryMenu(3));

//        $view->with('checkCategoryLevel', $this->category->checkCategoryLevel(3, 1));
    }

    function check($list){
        foreach ($list as $key=>$value){
          return   $this->category->checkCategoryLevel($value['category_id'], 1) ;
        }
    }
    /*
     * function multi menu
     */
    public function multiMenuLevel($list, $parent = 0,$level = 1 , &$newArr){
        if(count($list)>0){
            foreach($list as $key=>$values){
                if($values['category_parent_id'] == $parent){
                    $values['level'] = $level;
                    $newArr[]   = $values;
                    $parents    = $values['category_id'] ;
                    unset($list[$key]);
                    $this->multiMenuLevel($list, $parents ,$level + 1 ,$newArr);
                }
            }
        }
    }
}