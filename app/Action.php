<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    public function connection_tag()
    {
        return $this->belongsTo('App\ConnectionTag');
    }
}
