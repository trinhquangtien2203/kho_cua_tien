<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VpSplaptop1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_splaptop1', function (Blueprint $table) {
            $table->increments('splap_id');
            $table->string('splap_name');
            $table->string('splap_slug');
            $table->integer('splap_price');
            $table->string('splap_img');
            $table->string('splap_warranty');
            $table->string('splap_condition');
            $table->string('splap_accessories');
            $table->string('splap_promotion');
            $table->tinyInteger('splap_status');
            $table->text('splap_description');
            $table->tinyInteger('splap_featured');
            $table->integer('splap_lap')->unsigned();
            $table->foreign('splap_lap')
                  ->references('lap_id')
                  ->on('vp_dmlaptop')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('vp_splaptop1');
    }
}
