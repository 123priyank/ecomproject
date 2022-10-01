<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Color;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $banners = Banner::all();

        return view('admin.banners.banner', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.banners.create_banner');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //

        $request->validate([
    //            'image'=>'required|mimes:jpeg,jpg,png'

        ]);

        $banner = new Banner();

        $banner->btn_txt = $request->btn_txt;
        $banner->btn_link = $request->btn_link;

        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $filename = date('Ymd') . $file->getClientOriginalName();
            $file->move(public_path('banner'), $filename);
            $banner['image'] = $filename;
        }

        $banner->status = 1;

        $banner->save();

        return redirect()->route('banner')->with('success', 'Banner Add Successfully');
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
        $banner_edit = Banner::find($id);


        return view('admin.banners.edit_banner', compact('banner_edit'));

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
        $update_banner = Banner::find($id);
        $update_banner->btn_txt = $request->btn_txt;
        $update_banner->btn_link = $request->btn_link;
        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $filename = date('Ymd') . $file->getClientOriginalName();
            $file->move(public_path('banner'), $filename);
            $update_banner['image'] = $filename;
        }

        $update_banner->update();

        return redirect()->route('banner')->with('info', 'Banner Update Successfully');
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
        $delete_banner = Banner::find($id);

        $delete_banner->delete();

        return redirect()->back()->with('danger', 'Banner Delete Successfully');
    }

    public function status(Request $request, $status, $id)
    {
        $banner_satus = Banner::find($id);
        $banner_satus->status = $status;
        $banner_satus->save();

        return redirect()->route('banner')->with('update', 'Banner Status Update');
    }
}
