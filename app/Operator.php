<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $fillable = ['operator_name','username','password','level_id'];

    public function Operator(){
    	return $this->hasOne('App\Level','id','level_id');
    }
}
