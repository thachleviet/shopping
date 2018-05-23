<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 07/04/2018
 * Time: 3:31 CH
 */

namespace App\Models\Backend;


use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
class AdminTable extends Authenticatable
{

    use HasRoles;
    use Notifiable;
    protected $table = 'admins';
    protected $guard = 'admin' ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */



    protected $fillable = [
        'name', 'email', 'password', 'phone' , 'id', 'gender', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }
    public function getAll(){
        return $this->get() ;
    }
    //  function add data
    public function store(array $attribute){
      return  $this->create($attribute);
    }

    function getList(){
        return $this->from($this->table)->get();
    }
}