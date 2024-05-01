<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartCustomerQTYRelasi extends Model
{
    protected $table = 'part_customer_qty_relasi';

    protected $fillable = [
        'part_id',
        'customer_id',
        'qty_id',
    ];

    public $timestamps = false;

    public function part()
    {
        return $this->belongsTo(Part::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function qty()
    {
        return $this->belongsTo(QTY::class);
    }
}
