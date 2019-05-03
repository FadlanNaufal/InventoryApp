<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintain extends Model
{
     protected $fillable = [
        'item_id',
        'total',
        'borrow_id',
        'broken_date',
        'fix_date',
    ];

    public function item()
    {
        return $this->hasOne('App\Item','id','item_id');
    }

    public function borrow()
    {
        return $this->hasOne('App\Borrow','id','borrow_id');
    }
    public function borrower(){
        return $this->hasOne('App\Employee','id','id');
    }
}
