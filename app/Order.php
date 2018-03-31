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

    public function getTurkishDateAttribute()
    {
        return $this->created_at->format("d-m-Y H:i:s");
    }

    public function getStringOptionsAttribute(){
      $str = "";
      foreach(json_decode($this->options) as $key => $value){
        $str .= $key . ": " .$value . "</br>";
      }
      return $str;
    }
}
