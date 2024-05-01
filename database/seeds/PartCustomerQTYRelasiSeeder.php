<?php

use Illuminate\Database\Seeder;
use App\Models\PartCustomerQTYRelasi;

class PartCustomerQTYRelasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PartCustomerQTYRelasi::class, 183)->create();
    }
}
