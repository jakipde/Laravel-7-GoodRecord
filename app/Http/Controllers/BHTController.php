<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartCustomerQTYBHT;

class BHTController extends Controller
{
    // Method to fetch random part and customer data from BHT database
    public function fetchBHTData()
    {
        $partCustomerQTY = PartCustomerQTYBHT::inRandomOrder()->first();
        return response()->json([
            'partbht_id' => $partCustomerQTY->partbht_id,
            'customerbht_id' => $partCustomerQTY->customerbht_id,
            'qtybht_id' => $partCustomerQTY->qtybht_id,
        ]);
    }
}