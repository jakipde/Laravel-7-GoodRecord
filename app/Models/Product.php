<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $fillable = [
        'id',
        'shift',
        'part_id',
        'customer_id',
        'qty_id',
        'bop',
        'leader',
        'keterangan',
        'time_slot_id',
    ];

    protected $casts = [
        'hari_tanggal' => 'datetime:Y-m-d',
    ];

    protected static function boot()
    {
        parent::boot();
    
        static::created(function ($product) {
            // Determine the current time
            $currentTime = now();
    
            // Determine the time slot based on the current time
            if ($currentTime->hour >= 6 && $currentTime->hour <= 12) {
                $timeSlot = 1; // 06:01 - 12:00
            } elseif ($currentTime->hour > 12 && $currentTime->hour <= 18) {
                $timeSlot = 2; // 12:01 - 18:00
            } elseif ($currentTime->hour > 18 && $currentTime->hour <= 24) {
                $timeSlot = 3; // 18:01 - 24:00
            } elseif ($currentTime->hour >= 0 && $currentTime->hour <= 6) {
                $timeSlot = 4; // 00:01 - 06:00
            } else {
                // Handle invalid time
                $timeSlot = 5; // Set to null or any appropriate default value
            }

        // Create a new entry in the time_slot table with the determined time slot
        DB::connection('GoodRecord')->table('time_slot')->insert([
            'product_id' => $product->id,
            'time_slot' => $timeSlot,
            'created_at' => $currentTime,
            'updated_at' => $currentTime,
        ]);
    });
}

    public function part()
    {
        // Specify the connection and the table name explicitly for the 'Part' model
        return $this->belongsTo('App\Models\Part', 'part_id', 'id');
    }
    
    public function customer()
    {
        // Specify the connection and the table name explicitly for the 'Customer' model
        return $this->belongsTo('App\Models\Customer', 'customer_id', 'id');
    }

    public function qty()
    {
        // Specify the connection and the table name explicitly for the 'Customer' model
        return $this->belongsTo('App\Models\QTY', 'qty_id', 'id');
    }

    public function timeSlot()
    {
        return $this->belongsTo('App\Models\TimeSlot', 'time_slot_id', 'id');
    }
}