<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = [
        'name',
        'email',
        'created_at',
        'updated_at',

    ];

    // UniqueCheck

    public function UniqueCheck($data)
    {
        return $this->where('company_name',  $data)->get();
    }
}
