<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConnectionTag;
use App\Action;

class TagApiController extends Controller
{
    public function runAction(Request $request, ConnectionTag $connectionTag)
    {
        //new Action
        $action = new Action;
        $action->user_agent = $request->header('User-Agent');
        $action->ip_address = $request->ip();
        $action->connection_tag_id = $connectionTag->id;
        $action->save();
        //redirect user
        return redirect($connectionTag->action_url);
    }
}
