<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 18/05/2018
 * Time: 7:14 SA
 */

namespace App\Models\Backend;


use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $fillable = ['id', 'name', 'guard_name', 'created_at', 'updated_at'];
}