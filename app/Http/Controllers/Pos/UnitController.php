<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UnitController extends Controller
{
    public function UnitAll(){
        //$units = Unit::all();
        $units = Unit::latest()->get();
        return view('backend.unit.unit_all' ,compact('units'));
    }
    public function UnitAdd(){
        return view('backend.unit.unit_add');
    }
    public function UnitStore(Request $request){
        Unit::insert([
            'name' => $request->name,
            'create_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Thêm mới thành công', 
            'alert-type' => 'success'
        );

        return redirect()->route('unit.all')->with($notification);
    }
    public function UnitEdit($id){
        $unit = Unit::findOrFail($id);
        return view('backend.unit.unit_edit',compact('unit'));
    }

    public function UnitUpdate(Request $request){
        $unit_id = $request->id;

        Unit::findOrFail($unit_id)->update([
            'name'=>$request->name,
            'update_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Cập nhật thành công', 
            'alert-type' => 'success'
        );

        return redirect()->route('unit.all')->with($notification);

    }
    public function UnitDelete($id){
        
        Unit::findOrFail($id)->delete();

        $notification = array(
             'message' => 'Xóa đơn vị thành công', 
             'alert-type' => 'success'
         );
 
         return redirect()->back()->with($notification);
    }
}
