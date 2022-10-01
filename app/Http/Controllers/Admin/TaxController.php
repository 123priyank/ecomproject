<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    //
    public function index()
    {
        //
        $taxs_lists=Tax::all();

        return view('admin.taxes.tax',compact('taxs_lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.taxes.add_tax');
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
            'tax_desc' => 'required',
            'tax_value' => 'required'

        ]);
        //
        $add_tax= new Tax();
        $add_tax->tax_desc=$request->tax_desc;
        $add_tax->tax_value=$request->tax_value;
        $add_tax->status=1;
        $add_tax->save();

        return redirect()->route('taxs')->with('success','Tax Add Successfully');
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
        $tax_edit = Tax::find($id);


        return view('admin.taxes.edit_tax', compact('tax_edit'));

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
        $update_tax= Tax::find($id);
        $update_tax->tax_desc = $request->tax_desc;
        $update_tax->tax_value = $request->tax_value;
        $update_tax->update();

        return redirect()->route('taxs')->with('info', 'Tax Update Successfully');
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
        $delete_tax= Tax::find($id);

        $delete_tax->delete();

        return redirect()->back()->with('danger', 'Tax Delete Successfully');
    }

    public function status(Request $request, $status,$id)
    {

        $change_satus=Tax::find($id);
        $change_satus->status=$status;
        $change_satus->save();

        return redirect()->route('taxs')->with('update','Tax Status Update');
    }

}
