<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('connection_tag_id');
            $table->text('user_agent');
            $table->text('browser_name');
            $table->text('browser_family');
            $table->text('browser_version');
            $table->text('browser_engine');
            $table->text('platform_name');
            $table->text('platform_family');
            $table->text('platform_version');
            $table->text('device_family');
            $table->text('device_model');
            $table->text('mobile_grade');
            $table->text('ip_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actions');
    }
}
