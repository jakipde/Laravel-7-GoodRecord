<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QTYGRSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $qty = [
            "720",
            "480",
            //"600",
            "0",
        ];

        foreach ($qty as $qty) {
            DB::connection('GoodRecord')->table('qtys')->insert([
                ['name' => $qty],
            ]);
        }
    }
}
