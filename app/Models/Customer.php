<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $connection = "GoodRecord";
    protected $table = 'customers'; // Specify the table name explicitly
    protected $fillable = ['name'];
}
