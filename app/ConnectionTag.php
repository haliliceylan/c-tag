<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConnectionTag extends Model
{
    protected $fillable = ['action_url'];

    public function actions()
    {
        return $this->hasMany('App\Action');
    }
}
