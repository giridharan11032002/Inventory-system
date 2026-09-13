<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
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

    public function generateBill()
    {
        try {
        } catch (\Exception $e) {
            Session::flash("error", $e->getMessage());
            return redirect()->back();
        }
    }

    public function uniqueCheck(Request $request)
    {
        if ($request->ajax()) {
            $email = $request->email;
          
           
                $record = $this->custome->UniqueCheck($email);
          
            if ($record->count()) {
                return Response::json(false);
            }
            return Response::json(true);
        }
    }
}
