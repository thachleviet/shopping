<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 28/05/2018
 * Time: 1:19 CH
 */

namespace App\Http\ViewComposers\Frontend;
use App\Models\Frontend\Menu;
use App\Models\Frontend\News;
use Illuminate\View\View;

class MenuComposers
{

    protected $_menu;
    protected $_new;
    public function __construct(Menu $menu, News $news)
    {
        // Dependencies automatically resolved by service container...
        $this->_menu = $menu;
        $this->_new = $news;
    }

    public function compose(View $view)
    {
        $view->with('MenuTypeProduct', $this->_menu->getListMenuType('product'));
        $view->with('MenuTypeNew', $this->_menu->getListMenuType('new'));
        $view->with('Guide', $this->_new->getGuide());
    }
}