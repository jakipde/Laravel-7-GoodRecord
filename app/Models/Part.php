<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $connection = "GoodRecord";
    protected $table = 'parts'; // Specify the table name explicitly
    protected $fillable = ['name'];
}
