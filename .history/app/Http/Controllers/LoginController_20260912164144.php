<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    private $product;
    public function __construct()
    {
        $this->product = new Product();
    }
    public function login(Request $request)
    {
        try {
            $product = $this->product->get();
            $data = [
                'product' => $product,
            ];
            return view('welcome', $data);
        } catch (\Exception $e) {
            Session::flash("error", $e->getMessage());
            return redirect()->back();
        }
    }

    public function generateBill(){
        try{
            
        }
    }
}
