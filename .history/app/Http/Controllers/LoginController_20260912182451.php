<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use Carbon\Carbon;

use Illuminate\Support\Facades\Response;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    private $product;
    private $customer;
    private $order;
    private $orderItems;
    public function __construct()
    {
        $this->product = new Product();
        $this->customer = new Customer();
        $this->order = new Order();
        $this->orderItems = new OrderItems();
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
                'email'         => 'required|email',
            ];

            $messages = [
                'customer_name.required' => 'Please enter Customer Name',
                'email.required'         => 'Please enter Email',
                'email.email'            => 'Please enter Valid format',
            ];

            $validator = Validator::make(
                $request->all(),
                $rules,
                $messages
            );

            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            DB::transaction(function () use ($request, &$customerId, &$orderId) {

                // Store Customer
                $customer = $this->customer->store();

                $customerId = $customer->id;

                // Store Order
                $order = $this->order->store($customerId);

                $orderId = $order->id;

                // Store Order Items
                $this->orderItems->store($orderId);
            });

            Session::flash('success', 'Bill generated successfully.');
            return redirect('bill/checkout'.$customerId);
        } catch (\Exception $e) {


            Session::flash('error', $e->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function checkOut(Request $request){
try{

}cat
    }
    public function UniqueCheck(Request $request)
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
