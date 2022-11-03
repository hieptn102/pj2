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
    public function PurchaseStore(Request $request){
        if($request->category_id == null){
            $notification = array(
                'message' => 'Sorry you do not select any item',
                'alert-type' => 'error'
            );
            return redirect()->route('purchase.all')->with($notification);
        }else{
            $count_category = count($request->category_id);
            for ($i=0; $i < $count_category; $i++){
                $purchase = new Purchase();
                $purchase->date = date('Y-m-d', strtotime($request->date[$i]));
                $purchase->purchase_no = $request->purchase_no[$i];
                $purchase->supplier_id = $request->supplier_id[$i];
                $purchase->category_id = $request->category_id[$i];
                $purchase->product_id = $request->product_id[$i];
                $purchase->buying_qty = $request->buying_qty[$i];
                $purchase->unit_price = $request->unit_price[$i];
                $purchase->buying_price = $request->buying_price[$i];
                $purchase->description = $request->description[$i];

                $purchase->create_by = Auth::user()->id;
                $purchase->status = '0';
                $purchase->save();
            }//end foreach
        }//end else
        $notification = array(
            'message' => 'Lưu dữ liệu thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('purchase.all')->with($notification);
    }//end Method
    public function PurchaseDelete($id){
        Purchase::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Xóa đơn hàng thành công',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
