<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    public function connection_tag()
    {
        return $this->belongsTo('App\ConnectionTag');
    }

    public function getTurkishDateAttribute()
    {
        return $this->created_at->format("d-m-Y H:i:s");
    }

    public function getCtagIdAttribute()
    {
        return $this->connection_tag->ctag_id;
    }

    public function getComingFromAttribute()
    {
        switch ($this->from_type) {
        case 1:
        return "QC-Code";
        case 0:
        default:
        return "NFC";
      }
    }

    public function getAcceptableCountryFlagAttribute(){
      $flag = (count(explode("-",$this->acceptable_country)) == 2) ? strtolower(explode("-",$this->acceptable_country)[1]) : "";
      return '<span class="flag-icon flag-icon-'.$flag.'"></span>';
    }
}
