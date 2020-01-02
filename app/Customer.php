<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User','created_by','id');
    }
     public function item()
    {
        return $this->belongsTo('App\Item','item_id','id');
    }
      public function customer()
    {
        return $this->belongsTo('App\Customer','customer_id','id');
    }
    
    
}
