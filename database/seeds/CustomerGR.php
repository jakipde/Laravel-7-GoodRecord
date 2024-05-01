<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerGRSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
            "AISIN",
            "SHIROKI",
            "JFD",
            "Indosafety",
            "JFD-MMKI",
            "OES",
            "JFD-MMKI OES",
            "VANNING",
            "TAM",
            "OES ADM",
            "TTI",
            "DNHA",
            "DMNC-M",
            "DSTH",
            "DNMY",
            "DNTW",
            "ACZ",
            "DMNC-S",
            "DSTH OES",
        ];

        foreach ($customers as $customer) {
            DB::connection('GoodRecord')->table('customers')->insert([
                ['name' => $customer],
            ]);
        }
    }
}
