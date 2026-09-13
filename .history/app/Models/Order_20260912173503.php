<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = [
        'customer_id',
        'subtotal',
        'tax_total',
        'grand_total',
        'status',
        'created_at',
        'updated_at',

    ];

//    Store

public function store($id){
    $request = request();
    $insert_array =[
        'subtotal'=>$request->order_amount_total,
        'tax_total'=>$request->order_tax_total,
        'grand_total'=>$request->order_tax_total,
    ];

    $data = $this->create($insert_array);
return $data;
}

   
}
