<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'product_id',
        'order_id',
        'quantity',
        'unit_price',
        'tax_percentage',
        'line_total',
        'created_at',
        'updated_at',

    ];

    //    Store

    public function store($id)
    {
        $request = request();
        $insert_array = [
            'order_id' => $id,
            'product_id' => $request->order_amount_total,
            'tax_percentage' => $request->order_tax_total,
            'line_total' => $request->order_grand_total,
            'unit_price' => $request->order_grand_total,
            'unit_price' => $request->order_grand_total,
        ];

        $data = $this->create($insert_array);
        return $data;
    }
}
