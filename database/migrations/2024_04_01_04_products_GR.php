<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductsGR extends Migration
{
    public function up()
    {
        Schema::connection('GoodRecord')->create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('part_id');
            $table->unsignedBigInteger('customer_id');
            $table->date('hari_tanggal')->default(DB::raw('(GETDATE())'));
            $table->string('shift');
            $table->unsignedBigInteger('qty_id');
            $table->string('bop');
            $table->string('leader');
            $table->text('keterangan');
            $table->unsignedBigInteger('time_slot_id')->nullable();
            $table->timestamps();

            $table->foreign('part_id')->references('id')->on('parts')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('qty_id')->references('id')->on('qtys')->onDelete('cascade');
            // $table->foreign('time_slot_id')->references('id')->on('time_slot')->onDelete('cascade');


    //         // if (!Schema::connection('GoodRecord')->hasTable('time_slot')) {
    //         //     Schema::connection('GoodRecord')->table('time_slot', function (Blueprint $table) {
    //         //         $table->foreign('time_slot_id')->references('id')->on('time_slot')->onDelete('set null');
    //         //     });
    //         // }
        });
    }

    public function down()
    {
        Schema::connection('GoodRecord')->dropIfExists('products');
    }
}
