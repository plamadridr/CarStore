<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table= 'products';

    public function brand(){
        return $this->belongsTo('App\Brand');
    }

    public function ticketproducts(){
        return $this->hasMany('App\TicketProduct');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
