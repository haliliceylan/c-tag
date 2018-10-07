<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConnectionTag;
use App\Action;
use Browser;
use Cookie;

class TagApiController extends Controller
{
    public function runAction(Request $request, ConnectionTag $connectionTag, $qccode = 0)
    {
        //set user_id if not setted
        if(is_null($request->cookie('user_id'))){
            $user_id = str_random(15);
            Cookie::queue('user_id', $user_id, 24 * 31 * 12);
        }else{
            $user_id = $request->cookie('user_id');
        }
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
        $action->user_id = $user_id;
        //detect coming from
        if ($qccode != 0) {
            $action->from_type = 1; // coming from qr code
        }
        //detect from accept language
        $language = $request->server('HTTP_ACCEPT_LANGUAGE');
        $language = explode(",",explode(";",$language)[0])[0];
        $action->acceptable_country = $language;
        $action->save();
        //redirect user
        return redirect()->away($connectionTag->action_url);
    }
}
