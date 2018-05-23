<?php

class Constants{
    function checkExitEIdCategory($id){
        $mCategory  = new \App\Models\Frontend\CategoriesTable() ;
        return $mCategory->countIdParentOfId($id);
    }
    function countProductIds($id){
        $mCategory  = new \App\Models\Frontend\OrderTable() ;
        return $mCategory->countProductId($id);
    }

    function multiMenuLevel($list, $parent = 0,$level = 1 , &$newArr){
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

?>