<?php

namespace App\Http\Controllers;

use App\Mail\NotifyEmail;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Mail;
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


                $customer = $this->customer->store();

                $customerId = $customer->id;


                $order = $this->order->store($customerId);

                $orderId = $order->id;


                $this->orderItems->store($orderId);
            });

            return redirect('bill/checkout/' . $customerId)
                ->with('success', 'Bill generated successfully.');
        } catch (\Exception $e) {


            Session::flash('error', $e->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function checkOut(Request $request)
    {
        try {
            $id = $request->id;
            $customer = $this->customer->find($id);
            $order = $this->order->findOrder($id);
            $orderItems = $this->orderItems->findOrderItems($order->id);

            $data = [
                'customer' => $customer,
                'order' => $order,
                'orderItems' => $orderItems,
            ];


            return view('checkout', $data);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

   public function checkoutBill(Request $request)
{
    try {
        $id = $request->id;

        $customer = $this->customer->find($id);

        if (!$customer) {
            return redirect()->back()
                ->with('error', 'Customer not found.');
        }

        $order = $this->order->findOrder($id);

        if (!$order) {
            return redirect()->back()
                ->with('error', 'Order not found.');
        }

        $orderItems = $this->orderItems->findOrderItems($order->id);

        $email = $customer->email;

        $details = [
            'title'      => 'Ordered items',
            'customer'   => $customer->name,   // <-- was 'customer_name'
            'email'      => $customer->email,
            'orderItems' => $orderItems,
            'order'      => $order,            // <-- pass the whole $order object
        ];

        if (!empty($email)) {
            Mail::to($email)->queue(new NotifyEmail($details));
        }

        return redirect()->back()
            ->with('success', 'Bill has been Generated');
    } catch (\Exception $e) {
        return redirect()->back()
            ->withInput()
            ->with('error', $e->getMessage());
    }
}    public function UniqueCheck(Request $request)
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
