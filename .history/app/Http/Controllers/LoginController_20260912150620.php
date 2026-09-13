<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            $data =[
                
            ]
            return view('welcome',$data);
        } catch (\Exception $e) {
            Session::flash("error", $e->getMessage());
            return redirect()->back();
        }
    }
}
