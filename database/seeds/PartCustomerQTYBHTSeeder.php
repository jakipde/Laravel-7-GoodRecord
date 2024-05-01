<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PartCustomerQTYBHT;

class PartCustomerQTYBHTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PartCustomerQTYBHT::class, 183)->create();
    }
}
