<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = [
        'name',
        'email',
        'created_at',
        'updated_at',

    ];


    // store

    public function store(){
        $request = request();

        $in
    }

    // UniqueCheck

    public function UniqueCheck($data)
    {
        return $this->where('email',  $data)->get();
    }
}
