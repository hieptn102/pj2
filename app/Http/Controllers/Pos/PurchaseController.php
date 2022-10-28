<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;



class PurchaseController extends Controller
{
    public function PurchaseAll(){
        $allData = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();
        return view('backend.purchase.purchase_all', compact('allData'));
    }
    public function PurchaseAdd(){
        $supplier = Supplier::all();
        $product = Product::all();
        $category = Category::all();
        return view('backend.purchase.purchase_add', compact('supplier','product','category'));
    }
}
