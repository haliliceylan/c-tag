<?php

namespace App\Observers;

use App\Action;

class ActionObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  \App\Action  $user
     * @return void
     */
    public function created(Action $action)
    {
      $this::doBlockChain($action);
    }

    public static function doBlockChain(Action $action){
      if($action == Action::first()){
        $prev_hash = "";
      }else{
        $prev_hash = Action::where('id', '<', $action->id)->orderBy('id','desc')->first()->blockchain_hash;
      }
      $hash_columns = [
         "connection_tag_id",
         "user_agent",
         "browser_name",
         "browser_family",
         "browser_version",
         "browser_engine",
         "platform_name",
         "platform_family",
         "platform_version",
         "device_family",
         "device_model",
         "mobile_grade",
         "ip_address",
         "created_at",
         "updated_at",
         "from_type",
         "acceptable_country",
      ];
      $value = "prev_hash=".$prev_hash.";";

      foreach ($hash_columns as $key) {
        $value .= $key . "=" . $action->{$key} . ";";
      }
      
      $action->blockchain_hash = hash("sha512",$value);
      $action->save();
    }
}
