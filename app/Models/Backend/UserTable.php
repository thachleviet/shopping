<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 07/04/2018
 * Time: 3:31 CH
 */

namespace App\Models\Backend;



use Illuminate\Database\Eloquent\Model;


class UserTable extends Model
{

    public    $timestamps = false;


    protected $table        = 'users';
    protected $primaryKey   = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id', 'name', 'email', 'password', 'phone', 'status', 'gender', 'address', 'avatar', 'facebook_email', 'facebook_id', 'facebook_name', 'remember_token', 'ward_id', 'district_id', 'province_id', 'created_at', 'updated_at', 'confirmed', 'confirmation_code', 'type', 'is_updated', 'birthday'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getListUser($filter, $isPaging){
        $oSelect =  $this->select(
            'id',
                    'name',
                    'email',
                    'phone',
                    'status',
                    'gender',
                    'confirmed'
                    )
                    ->from($this->table);
        if(isset($filter['search']) && !empty(trim($filter['search']))){
            $oSelect->where($this->table.'.'.$filter['type'],'like','%'.$filter['search'].'%');
        }
        if(!empty($filter['status']) && $filter['status'] !='all'){
            $oSelect->where($this->table.'.confirmed', $filter['status']);
        }
        if($isPaging){
            return $oSelect->paginate(12);
        }
        return $oSelect->get();
    }

    public function getDetail($id){
        return $this->select(   'u.birthday',
                        'u.name',
                        'u.email',
                        'u.phone',
                        'u.gender',
                        'u.address',
                        'u.facebook_email',
                        'u.facebook_name',
                        'u.type',
                        'u.avatar',
                        'ward.name as ward_name',
                        'district.name as district_name',
                        'province.name as city_name'
                        )
                        ->from($this->table.' as u')
                        ->leftJoin(
                            'province',
                            'province.province_id', '=', 'u.province_id'
                        )
                        ->leftJoin(
                            'district',
                            'district.district_id', '=', 'u.district_id'
                        )
                        ->leftJoin(
                            'ward',
                            'ward.ward_id', '=', 'u.ward_id'
                        )->where('id', $id)->first();

    }


    public function edit($attribute, $id){
      return  $this->where('id', (int)$id)->update($attribute);
    }

    public function countUser(){
        return $this->count();
    }
}