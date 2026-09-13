<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

private $product;
public function __construct(
    public function login(Request $request)
    {
        try {
            $product = 
            $data =[
                ''
            ]
            return view('welcome',$data);
        } catch (\Exception $e) {
            Session::flash("error", $e->getMessage());
            return redirect()->back();
        }
    }
}
