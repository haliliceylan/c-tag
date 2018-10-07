<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Action;
use App\Observers\ActionObserver;
class ActionBlockChain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actions', function (Blueprint $table) {
            $table->string('blockchain_hash')->default("KEY_REQUIRED");
        });
        Action::all()->each(function($item){ActionObserver::doBlockChain($item);});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actions', function (Blueprint $table) {
            $table->dropColumn('blockchain_hash');
        });
    }
}
