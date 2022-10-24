<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SupplierController extends Controller
{
    public function SupplierAll(){
        $suppliers = Supplier::all();
        //$suppliers = Supplier::lastest()->get();
        return view('backend.supplier.supplier_all' ,compact('suppliers'));
    }
    public function SupplierAdd(){
        return view('backend.supplier.supplier_add');
    }
    public function SupplierStore(Request $request){
        Supplier::insert([
            'name' => $request->name,
            'mobiile_no' => $request->mobiile_no,
            'email' => $request->email,
            'adderss' => $request->adderss,
            'create_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Thêm mới thành công', 
            'alert-type' => 'success'
        );

        return redirect()->route('supplier.all')->with($notification);
    }
    public function SupplierEdit($id){
        $supplier = Supplier::findOrFail($id);
        return view('backend.supplier.supplier_edit',compact('supplier'));
    }
    public function SupplierUpdate(Request $request){
        $supplier_id = $request->id;
        
        Supplier::findOrFail($supplier_id)->update([
            'name' => $request->name,
            'mobiile_no' => $request->mobiile_no,
            'email' => $request->email,
            'adderss' => $request->adderss,
            'create_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Cập nhật thành công', 
            'alert-type' => 'success'
        );

        return redirect()->route('supplier.all')->with($notification);
    }
    public function SupplierDelete($id){
        
        Supplier::findOrFail($id)->delete();

        $notification = array(
             'message' => 'Xóa nhà cung cấp thành công', 
             'alert-type' => 'success'
         );
 
         return redirect()->back()->with($notification);
    }
}
