<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Image;

class CustomerController extends Controller
{
    public function CustomerAll(){
        //$customer = Customer::lastest()->get();
        $customer = Customer::all();
        return view('backend.customer.customer_all' ,compact('customer'));
    }
    public function CustomerAdd(){
        return view('backend.customer.customer_add');
    }
    public function CustomerStore(Request $request){
        $image = $request->file('customer_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        //343434.png
        Image::make($image)->resize(200,200)->save('upload/customer/'.$name_gen);
        $save_url = 'upload/customer/'.$name_gen;

        Customer::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'adderss' => $request->adderss,
            'customer_image' => $save_url,
            'create_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Thêm mới khách hàng thành công',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);
    }
    public function CustomerEdit($id){
        $customer = Customer::findOrFail($id);
        return view('backend.customer.customer_edit',compact('customer'));
    }
    public function CustomerUpdate(Request $request){
        $customer_id = $request->id;
        if($request->file('customer_image')){
            $image = $request->file('customer_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            //343434.png
            Image::make($image)->resize(200,200)->save('upload/customer/'.$name_gen);
            $save_url = 'upload/customer/'.$name_gen;

            Customer::findOrFail($customer_id)->update([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'adderss' => $request->adderss,
                'customer_image' => $save_url,
                'update_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Cập nhật khách hàng cùng hình ảnh thành công',
                'alert-type' => 'success'
            );

            return redirect()->route('customer.all')->with($notification);
        } else{
            $image = $request->file('customer_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            //343434.png
            Image::make($image)->resize(200,200)->save('upload/customer/'.$name_gen);
            $save_url = 'upload/customer/'.$name_gen;

            Customer::findOrFail($customer_id)->update([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'adderss' => $request->adderss,
                'update_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Cập nhật ảnh không thành công',
                'alert-type' => 'success'
            );

            return redirect()->route('customer.all')->with($notification);
        }
    }
    public function CustomerDelete($id){
        $customer = Customer::findOrFail($id);
        $img = $customer->customer_image;
        unlink($img);

        Customer::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Xóa dữ liệu thành công',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        
    }
}
