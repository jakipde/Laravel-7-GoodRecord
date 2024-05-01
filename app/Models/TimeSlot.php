<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    protected $connection = 'GoodRecord';
    protected $table = 'time_slot';

    protected $fillable = [
        'product_id',
        'time_slot',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    
    // public function timeslot()
    // {
    //     return $this->belongsTo(Product::class, 'time_slot', 'id');
    // }
}
