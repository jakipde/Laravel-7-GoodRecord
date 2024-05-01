<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartCustomerQTYBHT extends Model
{
    protected $connection = 'BHT'; // Specify the connection
    protected $table = 'partcustomerqty'; // Specify the table name explicitly
    protected $fillable = ['partbht_id', 'customerbht_id', 'qtybht_id']; // Specify the fillable fields

    public $timestamps = false; // Disable timestamps for this model
}
