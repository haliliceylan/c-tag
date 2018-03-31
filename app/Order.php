<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
      'masa_id',
      'food_name',
      'price',
      'options',
    ];

    public function action(){
      return $this->belongsTo('App\Action');
    }
}
