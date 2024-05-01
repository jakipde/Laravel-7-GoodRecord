<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PartCustomerQTYBHT extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::connection('BHT')->hasTable('partcustomerqty')) {
            Schema::connection('BHT')->create('partcustomerqty', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('partbht_id');
                $table->unsignedBigInteger('customerbht_id');
                $table->unsignedBigInteger('qtybht_id');
                // $table->timestamps();
            });
        }

        if (!Schema::connection('GoodRecord')->hasTable('parts')) {
            Schema::connection('BHT')->table('partcustomerqty', function (Blueprint $table) {
                $table->foreign('partbht_id', 'fk_partcustomerqty_partbht_id')->references('id')->on('GoodRecord.parts')->onDelete('cascade')->onUpdate('cascade');
            });
        }

        if (!Schema::connection('GoodRecord')->hasTable('customers')) {
            Schema::connection('BHT')->table('partcustomerqty', function (Blueprint $table) {
                $table->foreign('customerbht_id', 'fk_partcustomerqty_customerbht_id')->references('id')->on('GoodRecord.customers')->onDelete('cascade')->onUpdate('cascade');
            });
        }

        if (!Schema::connection('GoodRecord')->hasTable('qtys')) {
            Schema::connection('BHT')->table('partcustomerqty', function (Blueprint $table) {
                $table->foreign('qtybht_id', 'fk_partcustomerqty_qtybht_id')->references('id')->on('GoodRecord.qtys')->onDelete('cascade')->onUpdate('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('BHT')->dropIfExists('partcustomerqty');
    }
}
