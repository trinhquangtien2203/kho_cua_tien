<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VpLapcomment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_lapcomment', function (Blueprint $table) {
            $table->increments('lapcom_id');
            $table->string('lapcom_email');
            $table->string('lapcom_name');
            $table->string('lapcom_content');
            $table->integer('lapcom_lap')->unsigned();
            $table->foreign('lapcom_lap')
                  ->references('splap_id')
                  ->on('vp_splaptop1')
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
        Schema::dropIfExists('vp_lapcomment');
    }
}
