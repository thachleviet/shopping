<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 10/04/2018
 * Time: 12:16 SA
 */

namespace App\Repositories\Backend\Category;


interface CategoryRepositoryInterface
{
    public function listItem();
    public function add(array $attributes);
    public function update(array  $attributes,array $option);
    public function getItem($id);
    public function save(array  $attributes, $id);
    public function deleteItem($id);
    public function filterCategory($filter, array $option);
    public function deleteItemMulti(array $attributes) ;
    public function deleteWhere($id, $attributes);
}