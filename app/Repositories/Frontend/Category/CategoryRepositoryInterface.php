<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 10/04/2018
 * Time: 12:16 SA
 */

namespace App\Repositories\Frontend\Category;


interface CategoryRepositoryInterface
{
    public function listItem();

    public function getCategoryMenu($level);

    public function checkCategoryLevel($id  , $level) ;
    public function getListCategory($idCategory,$attribute, $isPaging);
    public function getListCategoryLevel($columns, $options) ;
    public function search($param);
}