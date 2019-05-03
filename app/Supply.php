<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
     protected $fillable = ['name','user_id','total','item_id'];

    public function User(){
    	return $this->hasOne('App\User','id','user_id');
    }

    public function Item(){
    	return $this->hasOne('App\Item','id','item_id');	
    }
}
