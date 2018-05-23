<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 20/05/2018
 * Time: 9:17 CH
 */

namespace App\Repositories\Backend\News;


use App\Repositories\Backend\BackendRepositoryInterface;

interface NewsRepositoryInterface extends BackendRepositoryInterface
{
    public function thach();
}