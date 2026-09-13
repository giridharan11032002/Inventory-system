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
        'unit_price',
        'status',
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
            'tax_total' => $request->order_tax_total,
            'grand_total' => $request->order_grand_total,
        ];

        $data = $this->create($insert_array);
        return $data;
    }
}
