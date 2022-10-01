<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Coupon;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product_brands=Brand::all();
        return view('admin.brands.product_brand',compact('product_brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.brands.add_brand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,gif',

        ]);
        //
        $add_brand = new Brand();
        $add_brand->name = $request->name;

        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $filename = date('Ymd') . $file->getClientOriginalName();
            $file->move(public_path('brand'), $filename);
            $add_brand['image'] = $filename;
        }
        $add_brand->status = 1;
        $add_brand->save();

        return redirect()->route('brands')->with('success', 'Brand Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $brand_edit = Brand::find($id);


        return view('admin.brands.edit_brand', compact('brand_edit'));

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
        $update_brand = Brand::find($id);

        $update_brand->name = $request->name;
//        $update_brand=$request->image;
        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $filename = date('Ymd') . $file->getClientOriginalName();
            $file->move(public_path('brand'), $filename);
            $update_brand['image'] = $filename;
        }
        $update_brand->update();

        return redirect()->route('brands')->with('info', 'Brand Update Successfully');
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
        $delete_brand = Brand::find($id);

        $delete_brand->delete();

        return redirect()->back()->with('danger', 'Brand Delete Successfully');
    }

    public function status(Request $request, $status, $id)
    {

        $brand_satus = Brand::find($id);
        $brand_satus->status = $status;
        $brand_satus->save();

        return redirect()->route('brands')->with('update', 'Brand Status Update');
    }

}
