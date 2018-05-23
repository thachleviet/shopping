<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 29/01/2018
 * Time: 11:52 PM
 */
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Frontend\Category\CategoryRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;


class CategoryController extends Controller
{

    protected $request;
    protected $category;

	public function __construct(Request $request , CategoryRepositoryInterface $categoryRepository)
	{
		$this->middlewareAction();
		$this->category    = $categoryRepository;
		$this->request     = $request;
	}

	public function middlewareAction(){
        $this->middleware('web');
    }
    /*
     * 1=> get list id level 1 có parent_id = id
     * 2=> get list id level 2 có parent_id trong array id của 1
     * 3=> gte list
     */

    public function indexAction(){
        return view('frontend.category.index');
    }


    public function listCategoryOfIdAction(Request $request, $id){
        $page 		          = Input::get('page', 1);
        $param['start_price'] = !empty($request->input('start_price')) ? $request->input('start_price') : 'all';
        $param['end_price']   = !empty($request->input('end_price')) ? $request->input('end_price') : 'all';
        $param['sort']        = !empty($request->get('sort')) ? $request->get('sort') : 'desc';
        $param['limit']       = !empty($request->get('limit')) ? $request->get('limit') : 12;
        $listWinner           = $this->category->getListCategory($id,$param , true);
        //$offSet 	          = ($page * $param['limit']) - $param['limit'];
        //$itemsForCurrentPage  = array_slice($listWinner, $offSet, $param['limit'], true);
        ///$listWinner           = new LengthAwarePaginator($itemsForCurrentPage, count($listWinner), $param['limit'], $page);
        //$listWinner->setPath(route('categorys.list-category',$id));
        return view('frontend.category.list-category', [
            'listCategory'=>$listWinner,
            'param' =>$param
        ]);
    }


    public function listCategoryVAction(Request $request){

        $param['sort']   = !empty($request->get('sort')) ? $request->get('sort') : 'desc';
        $param['limit']  = !empty($request->get('limit')) ? $request->get('limit') : null;

        $listWinner     = $this->category->getListCategory($request->get('id'),$param , true);

         return view('frontend.category.list-category-v', [
             'listCategory'=>$listWinner
        ]);
    }

}