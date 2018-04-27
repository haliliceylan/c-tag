<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ConnectionTag;

class ConnectionTagController extends Controller
{
    public function show(ConnectionTag $connectionTag){
      return $connectionTag;
    }
}
