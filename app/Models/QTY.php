<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QTY extends Model
{
    protected $connection = "GoodRecord";
    protected $table = 'qtys'; // Specify the table name explicitly
    protected $fillable = ['name'];
}
