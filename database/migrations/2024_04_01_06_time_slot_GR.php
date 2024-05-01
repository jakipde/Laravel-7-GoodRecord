<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TimeSlotGR extends Migration
{
    public function up()
    {
        Schema::connection('GoodRecord')->create('time_slot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->integer('time_slot');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::connection('GoodRecord')->dropIfExists('time_slot');
    }
}
