<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConnectionTag extends Model
{
    protected $fillable = ['action_url'];
    protected $hidden = ['id','created_at','updated_at'];
    public function actions()
    {
        return $this->hasMany('App\Action');
    }

    public function getCtagIdAttribute()
    {
        return str_pad($this->id, 5, "0",STR_PAD_LEFT);
    }
}
