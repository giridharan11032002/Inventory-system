<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    private $product;
    private $customer;
    public function __construct()
    {
        $this->product = new Product();
        $this->customer = new Customer();
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

    public function generateBill(Request $request)
    {
        try {
            $rules = [
                'customer_name' => 'required',
                'email' => 'required|email'
             
            ];
            $messages = [
                'customer_name.required' => 'Please enter Customer Name',
                'email.required' => 'Please enter Email',
                'email.email' => 'Please enter Valid format',
              

            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data 
        } catch (\Exception $e) {
            Session::flash("error", $e->getMessage());
            return redirect()->back();
        }
    }

    public function uniqueCheck(Request $request)
    {
        if ($request->ajax()) {
            $email = $request->email;


            $record = $this->customer->UniqueCheck($email);

            if ($record->count()) {
                return Response::json(false);
            }
            return Response::json(true);
        }
    }
}
