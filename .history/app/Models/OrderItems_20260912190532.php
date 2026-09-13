<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;

    protected $table = 'order_items';

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


    // Relation ship model

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function findOrderItems($id)
    {
        $items = $this->where('order_id', $id)->with('product')->get();

       return $items;
    }
    public function store($id)
    {
        $request = request();

        foreach ($request->products as $product) {

            $insert_array = [
                'order_id'       => $id,
                'product_id'     => $product['product_id'],
                'tax_percentage' => $product['tax_percentage'],
                'line_total'     => $product['total_amount'],
                'unit_price'     => $product['unit_price'],
                'quantity'       => $product['quantity'],
            ];

            $data = $this->create($insert_array);
        }

        return $data;
    }
}
