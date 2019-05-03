<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name','item_code','room_id','user_id','type_id','desc','total'];

    public function Room(){
    	return $this->hasOne('App\Room','id','room_id');
    }

    public function Type(){
    	return $this->hasOne('App\Type','id','type_id');
    }

    public function User(){
    	return $this->hasOne('App\User','id','user_id');
    }
}
