<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConnectionTag;
use App\Action;
use Browser;

class TagApiController extends Controller
{
    public function runAction(Request $request, ConnectionTag $connectionTag)
    {
        //new Action
        $action = new Action;
        $action->user_agent = $request->header('User-Agent');
        $action->ip_address = $request->ip();
        $action->browser_name = Browser::browserName();
        $action->browser_family = Browser::browserFamily();
        $action->browser_version = Browser::browserVersion();
        $action->browser_engine = Browser::browserEngine();
        $action->platform_name = Browser::platformName();
        $action->platform_family = Browser::platformFamily();
        $action->platform_version = Browser::platformVersion();
        $action->device_family = Browser::deviceFamily();
        $action->device_model = Browser::deviceModel();
        $action->mobile_grade = Browser::mobileGrade();
        $action->connection_tag_id = $connectionTag->id;
        $action->save();
        //redirect user
        return redirect($connectionTag->action_url);
    }
}
