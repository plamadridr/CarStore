<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $table= 'tickets';

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function ticketproducts(){
        return $this->hasMany('App\TicketProduct');
    }
}
