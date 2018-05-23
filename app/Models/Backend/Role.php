<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 18/05/2018
 * Time: 7:14 SA
 */

namespace App\Models\Backend;


use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['id', 'name', 'guard_name', 'created_at', 'updated_at'];
}