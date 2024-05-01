<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class ProductsValueBinder implements WithMapping, WithHeadings
{
    public function map($product): array
    {
        return [
            $product->shift->name,
            $product->part->name,
            $product->customer->name,
            $product->qty->name,
            $product->bop->name,
            $product->leader->name,
            $$product->keterangan->name,
            Carbon::parse($product->created_at)->timezone('Asia/Jakarta')->format('Y/m/d - H:i'),
            Carbon::parse($product->updated_at)->timezone('Asia/Jakarta')->format('Y/m/d - H:i'),
        ];
    }

    public function headings(): array
    {
        return [
            'shift',
            'part_id',
            'customer_id',
            'qty',
            'bop',
            'leader',
            'keterangan',
            'Dibuat Pada',
            'Diubah Pada',
        ];
    }
}
