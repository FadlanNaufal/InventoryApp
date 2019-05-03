<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticableContract;

class Employee extends Model implements AuthenticableContract
{
	use Authenticatable;
    protected $fillable = ['name','nip','password','address'];
}
