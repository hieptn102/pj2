<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class CustomerController extends Controller
{
    public function CustomerAll(){
        $customer = Customer::lastest()->get();
        return view('backend.customer.customer_all' ,compact('customer'));
    }
}
