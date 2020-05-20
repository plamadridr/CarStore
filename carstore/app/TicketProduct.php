<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketProduct extends Model
{
    //
    protected $table= 'ticketproducts';

    public function ticket(){
        return $this->belongsTo('App\Ticket');
    }

    public function product(){
        return $this->belongsTo('App\Product');
    }
}
