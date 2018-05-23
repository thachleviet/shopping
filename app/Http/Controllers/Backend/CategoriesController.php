<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 29/01/2018
 * Time: 11:52 PM
 */
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Backend\Category\CategoryRepositoryInterface;
use Illuminate\Session\Store;
class CategoriesController extends Controller
{

    protected $category;

	public function __construct(CategoryRepositoryInterface $categoryRepository)
	{
		$this->middlewareAction();
		$this->category    = $categoryRepository;
	}

	public function middlewareAction(){
        $this->middleware('auth:admin');
    }
	/*
	 * function get list category
	 * author Huynh Nhu
	 * return list array
	 */
	public function indexAction(){
		$title          = 'Danh mục sản phẩm' ;
		$listCategories = $this->category->listItem();
        $this->multiMenuLevel($listCategories , 0, 2, $oList);
		return view('backend.category.index' ,array('title'=>$title, 'object'=>$oList));
	}
    /*
     * function add category
     * author Huynh Nhu
     * return list array
     */
	public function addAction(){
        $listCategory = $this->category->listItem();
        $this->multiMenuLevel($listCategory , 0, 2, $oList);
		$title = 'Thêm danh mục sản phẩm';
		return view('backend.category.add' ,array('object'=>$oList, 'title'=>$title));
	}

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

    /*
     * function filter category
     * @author Huynh Nhu
     * 15/04/2018
     */
    public function filterCategoryAction(Request $request)
    {

	    if($request->isMethod('post')){
	        return response()->json([
	            'status'            =>  1,
                'data'              =>  $this->category->filterCategory($request->input('level'), null),
                'message_success'   =>  'Cập nhật dữ liệu thành công'
            ]);
        }
        return response()->json([
            'status'            =>1,
            'message_warning'   =>'Cập nhật dữ liệu không thành công'
        ]);
    }
	/*
	 * function submitAdd Item
	 * author Huynh Nhu
	 */
    public function submitAddAction(Request $request){
	    $this->validate($request,[
            'category_name'=>'required'
        ],[
            'category_name.required'=>'Tên danh mục bắt buộc !'
        ]);
        if($request->input('category_type') == 'new') {
            if($this->category->add($request->only([
                'category_name',
                'is_active',
                'category_type']))
            )return redirect()->route('category') ;

        }
        if($this->category->add($request->only([
            'category_name',
            'is_active',
            'category_type',
            'category_level',
            'category_parent_id'])
        )){
            $request->session()->flash('add_success' , 'Thêm dữ liệu thành công !') ;
            return redirect()->route('category') ;
        }
        return view('backend.category.add' ,array('title'=>'Thêm danh mục sản phẩm'));
    }

    /*
    * function edit category
    * author Huynh Nhu
    * return list array
    */
    public function editAction($id){
        $item  = $this->category->getItem($id)  ;
        $title = 'Cập nhật danh mục sản phẩm' ;
        return view('backend.category.edit' ,array('object'=>$item, 'title'=>$title));
    }
    /*
	 * function submitEdit Item
	 * author Huynh Nhu
     * 15/04/2018
	 */
    public function submitEditAction(Request $request){
        $this->validate($request,[
            'category_name'=>'required',
        ],[
            'category_name.required'=>'Tên danh mục bắt buộc !',
        ]);
        if($this->category->update($request->only(['category_name','is_active', 'category_id']),array('action'=>'edit'))){
            return redirect()->route('category') ;
        }
        return view('backend.category.edit' ,array('title'=>'Cập nhật danh mục sản phẩm'));
    }

    /*
     * function delete Multi Item
     * author Huynh Nhu
     * 15/04/2018
     */
    public function removeMultiAction(Request $request){

        if($this->category->deleteItemMulti($request->only('data'))){

            return response()->json(['status'=>1, 'message_success'=>'Đã xóa một thể loại']);

        }
        return response()->json(['status'=>0, 'message_warning'=>'Xóa dữ liệu không thành công']);
    }
    /*
     * function delete  Item
     * author Huynh Nhu
     * 15/04/2018
     */
	public function removeAction($id){

	    $this->category->deleteItem($id) ;
        return response()->json([
            'error'   => 0,
            'message' => 'Remove success'
        ]);
    }
    /*
     * function ordering
     * author Huynh Nhu
     * 15/04/2018
     */
    public function orderingAction(Request $request){
	    if($request->isMethod('post')){

            if($this->category->update($request->only(['category_ordering', 'category_id']), array('action'=>'ordering'))){
                return response()->json(['status'=>1, 'message_success'=>'Cập nhật dữ liệu thành công']);
            }
        }
        return response()->json(['status'=>0, 'message_warning'=>'Cập nhật dữ liệu thất bại']);
    }

}