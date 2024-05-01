<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PartCustomerQTYRelasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_customer_qty_relasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('part_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('qty_id');
    
            $table->foreign('part_id')->references('id')->on('parts');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('qty_id')->references('id')->on('qtys');
        });
    }
}
