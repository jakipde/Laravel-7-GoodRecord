<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QTYGR extends Migration
{
    public function up()
    {
        Schema::connection('GoodRecord')->create('qtys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
    }

    public function down()
    {
        Schema::connection('GoodRecord')->dropIfExists('qtys');
    }
}