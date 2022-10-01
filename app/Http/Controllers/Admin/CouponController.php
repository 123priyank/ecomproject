<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $coupon_lists=Coupon::all();

        return view('admin.coupon.coupon',compact('coupon_lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.coupon.add_coupon');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $request->validate([
             'title' => 'required',
             'code' => 'required|unique:coupons',
             'value' => 'required'
          ]);
        //
        $add_coupon= new Coupon();
        $add_coupon->title=$request->title;
        $add_coupon->code=$request->code;
        $add_coupon->value=$request->value;
        $add_coupon->type=$request->type;
        $add_coupon->min_order_amt=$request->min_order_amt;
        $add_coupon->is_one_time=$request->is_one_time;
        $add_coupon->status=1;
        $add_coupon->save();

        return redirect()->route('coupon')->with('success','Coupon Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $coupon_edit = Coupon::find($id);


        return view('admin.coupon.edit_coupon', compact('coupon_edit'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $update_coupon = Coupon::find($id);
        $update_coupon->title = $request->title;
        $update_coupon->code = $request->code;
        $update_coupon->value = $request->value;
        $update_coupon->type=$request->type;
        $update_coupon->min_order_amt=$request->min_order_amt;
        $update_coupon->is_one_time=$request->is_one_time;
        $update_coupon->update();

        return redirect()->route('coupon')->with('info', 'Category Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete_coupon = Category::find($id);

        $delete_coupon->delete();

        return redirect()->back()->with('danger', 'Category Delete Successfully');
    }

    public function status(Request $request, $status,$id)
    {

        $change_satus=Coupon::find($id);
        $change_satus->status=$status;
        $change_satus->save();

        return redirect()->route('coupon')->with('update','Coupon Status Update');
    }

}
