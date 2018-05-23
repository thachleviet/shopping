<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\NewsModel;
use App\Repositories\Backend\News\NewsRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $news ;
    public function __construct(NewsRepositoryInterface $newsRepository)
    {
        $this->news = $newsRepository;
    }

    public function index()
    {

        $oList = $this->news->getAll();
        echo '<pre>';
        print_r($oList);
        echo '</pre>';
        return view('backend.news.index');
    }

//    public function getListAction(){
//        $mNew  =    new NewsModel();
//        $item  =   $mNew->getAll()->toArray();
//        return response()->json($item);
//    }
}
