<?php

use Database\Seeders\PartCustomerQTYBHTSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PartGRSeeder::class,
            CustomerGRSeeder::class,
            QTYGRSeeder::class,
            PartCustomerQTYBHTSeeder::class,
            PartCustomerQTYRelasiSeeder::class,
        ]);
    }
    }
