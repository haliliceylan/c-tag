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
        return str_pad($this->connection_tag_id, 5, "0",STR_PAD_LEFT);
    }
}
