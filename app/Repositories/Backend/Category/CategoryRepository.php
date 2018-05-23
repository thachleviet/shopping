<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 10/04/2018
 * Time: 12:17 SA
 */

namespace App\Repositories\Backend\Category;



use App\Models\Backend\CategoriesTable;

class CategoryRepository  implements CategoryRepositoryInterface
{
    protected  $category;

    public function __construct(CategoriesTable $categoriesTable)
    {
        $this->category = $categoriesTable;
    }

    public function listItem(){
        return $this->category->getList();
    }

    public function add(array  $attributes)
    {
        // TODO: Implement create() method.
        $attributes['category_status']          = $attributes['is_active'];
        $attributes['category_parent_id']       = isset($attributes['category_parent_id']) ? $attributes['category_parent_id'] : 0;
        unset($attributes['is_active']) ;
        return  $this->category->add($attributes);


    }
    public function save(array $attributes, $id)
    {
        // TODO: Implement save() method.
    }
    /*
     * function update
     *
     */
    public function update(array $attributes,array $option = null)
    {
        // TODO: Implement update() method.
        // edit
         if($option['action'] == 'edit'){

             $attributes['category_status']  = $attributes['is_active'] ;

             unset($attributes['is_active']);

             $this->category->edit($attributes,$attributes['category_id']);

             return $attributes['category_id'] ;
         }
         // ordering
         if($option['action'] == 'ordering'){

             $data['category_ordering']  = $attributes['category_ordering'] ;

             $this->category->edit($data,$attributes['category_id']);

             return $attributes['category_id'] ;
         }
         return false ;
    }

    public function getItem($id)
    {
        return $this->category->getItem($id);// TODO: Implement getItem() method.
    }
    public function deleteItem($id)
    {
        return $this->category->deleteItem($id); // TODO: Implement delete() method.
    }
    public function filterCategory($filter,array $option = null)
    {
        // TODO: Implement filterCategory() method.

        return $this->category->filterCategory($filter, null);
    }
    /*
     * function delete multi Items
     */
    public function deleteItemMulti(array $attributes)
    {
       return $this->category->deleteItemMulti($attributes);// TODO: Implement deleteItemMulti() method.
    }

    public function deleteWhere($id, $attributes)
    {
        // TODO: Implement deleteWhere() method.
    }
}