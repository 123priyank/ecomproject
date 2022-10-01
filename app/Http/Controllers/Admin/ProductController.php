<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Product_attr;
use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //show product in table
        $product_stores = Product::all();
        return view('admin.product.products', compact('product_stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //product create form  multi table
        $categorys = DB::table('categories')->where(['status' => 1])->get();
        $brands = DB::table('brands')->where(['status' => 1])->get();
        $sizes = DB::table('sizes')->where(['status' => 1])->get();
        $colors = DB::table('colors')->where(['status' => 1])->get();
        $taxes = DB::table('taxes')->where(['status' => 1])->get();

        return view('admin.product.create_product', compact('categorys', 'sizes', 'colors', 'brands', 'taxes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // product field validatinon
        $request->validate([
            'name' => 'required',
//            'slug' => 'required|unique:products',
            'image' => 'required|mimes:jpg,png,gif,jpeg',
            'short_desc' => 'required',
            'brand' => 'required',
            'warranty' => 'required',
            'sku' => 'required|unique:products_attr',
            'images' => 'required'
        ]);

        //*product details store in database*//

        $Add_product = new Product();
        $Add_product->name = $request->name;
        $Add_product->slug = Str::Slug($Add_product->name, '-');

        //*image upload code with move method *//

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('Ymd') . $file->getClientOriginalName();
            $file->move(public_path('main_image'), $filename);
            $Add_product['image'] = $filename;
        }
        //*image upload code with move method end *//

        $Add_product->category_id = $request->category_id;
        $Add_product->brand = $request->brand;
        $Add_product->model = $request->model;
        $Add_product->short_desc = $request->short_desc;
        $Add_product->desc = $request->desc;
        $Add_product->keywords = $request->keywords;
        $Add_product->technical_specification = $request->technical_specification;
        $Add_product->uses = $request->uses;
        $Add_product->warranty = $request->warranty;
        $Add_product->lead_time = $request->lead_time;
        $Add_product->tax_id = $request->tax_id;
        $Add_product->tax_type = $request->tax_type;
        $Add_product->is_promo = $request->is_promo;
        $Add_product->is_featured = $request->is_featured;
        $Add_product->is_discounted = $request->is_discounted;
        $Add_product->is_tranding = $request->is_tranding;
        $Add_product->status = 1;
        $Add_product->save();

        //*product details store in database end code *//

        /*Product Attr store in database Start*/
        $paidArr = $Add_product->id;
        $skuArr = $request->sku;
        $mrpArr = $request->mrp;
        $priceArr = $request->price;
        $qtyArr = $request->qty;
        $size_idArr = $request->size_id;
        $color_idArr = $request->color_id;

        foreach ($skuArr as $key => $val) {
            $productAttrArr['product_id'] = $paidArr;
            $productAttrArr['sku'] = $skuArr[$key];
            $productAttrArr['mrp'] = $mrpArr[$key];
            $productAttrArr['price'] = $priceArr[$key];
            $productAttrArr['qty'] = $qtyArr[$key];
            $productAttrArr['size_id'] = $size_idArr[$key];
            $productAttrArr['color_id'] = $color_idArr[$key];

            if ($request->hasFile("attr_image.$key")) {
                $file = $request->file("attr_image.$key");
                $filename = date('Ymd') . $file->getClientOriginalName();
                $file->move(public_path('attrimage'), $filename);
                $productAttrArr['attr_image'] = $filename;
            }

            DB::table('products_attr')->insert($productAttrArr);
        }
        /*Product Attr store in database  end*/


        //*product images store product_images table start*//
        $image_id = $request->id;
        $pimage = $Add_product->id;
        foreach ($image_id as $key => $val) {

            $productimage['product_id'] = $pimage;

            if ($request->hasFile("images.$key")) {
                $file = $request->file("images.$key");
                $filename = date('Ymd') . $file->getClientOriginalName();
                $file->move(public_path('varient_image'), $filename);
                $productimage['images'] = $filename;
            }


            DB::table('product_images')->insert($productimage);

        }
        //*product images store product_images table end*//

        return redirect()->route('product');

        return redirect('admin.product.products')->with('success', 'Product Add successfully');

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
    public
    function edit($id)
    {
        //
        //* product data show in form with multi table in database start *//
        $edit_product = Product::find($id);

        $edit_category = Category::all();
        $brands = Brand::all();
        $edit_sizes = DB::table('sizes')->where(['status' => 1])->get();
        $edit_taxs = Tax::all();


        $edit_colors = DB::table('colors')->where(['status' => 1])->get();

        $productAttrArr = DB::table('products_attr')->where('product_id', $id)->get();
        $productAttrimages = DB::table('product_images')->where('product_id', $id)->get();

        //* product data show in form with multi table in database end *//


        return view('admin.product.edit_product', compact('edit_product', 'edit_category', 'edit_sizes', 'edit_colors', 'productAttrArr', 'productAttrimages', 'edit_taxs', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {

        //* update product deatils data with multi table record  start *//

//        $update_product = new Product();
        $update_product = Product::find($id);
        //  dd($update_product);
        $update_product->name = $request->name;
        $update_product->slug = $request->slug;

        //* update product images  start *//

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('Ymd') . $file->getClientOriginalName();
            $file->move(public_path('main_image'), $filename);
            $update_product['image'] = $filename;
        }
        //* update product images  end *//


        $update_product->category_id = $request->category_id;
        $update_product->brand = $request->brand;
        $update_product->model = $request->model;
        $update_product->short_desc = $request->short_desc;
        $update_product->desc = $request->desc;
        $update_product->keywords = $request->keywords;
        $update_product->technical_specification = $request->technical_specification;
        $update_product->uses = $request->uses;
        $update_product->warranty = $request->warranty;
        $update_product->lead_time = $request->lead_time;
        $update_product->tax_id = $request->tax_id;
        $update_product->tax_type = $request->tax_type;
        $update_product->is_promo = $request->is_promo;
        $update_product->is_featured = $request->is_featured;
        $update_product->is_discounted = $request->is_discounted;
        $update_product->is_tranding = $request->is_tranding;
        $update_product->update();

        //* update product deatils data with multi table record  end *//


//        $pid = $update_product->id;


        /*update Product Attr Start*/

        $paidArr = $request->id;
        $productid = $update_product->id;
        $skuArr = $request->sku;
        $mrpArr = $request->mrp;
        $priceArr = $request->price;
        $qtyArr = $request->qty;
        $size_idArr = $request->size_id;
        $color_idArr = $request->color_id;


        foreach ($skuArr as $key => $val) {

//            $productAttr['id'] = $paidArr;
            $productAttr['product_id'] = $productid;
            $productAttr['sku'] = $skuArr[$key];

            $productAttr['mrp'] = $mrpArr[$key];
            $productAttr['price'] = $priceArr[$key];
            $productAttr['qty'] = $qtyArr[$key];
            $productAttr['size_id'] = $size_idArr[$key];
            $productAttr['color_id'] = $color_idArr[$key];
//dd($val);
            if ($request->hasFile("attr_image.$key")) {
                $file = $request->file("attr_image.$key");
                $filename = date('Ymd') . $file->getClientOriginalName();
                $file->move(public_path('attrimage'), $filename);
                $productAttr['attr_image'] = $filename;
            }


            DB::table('products_attr')->where(['id' => $paidArr[$key]])->update($productAttr);

        }
        /*update Product Attr end*/


        //* upadate product images start *//
        $image_id = $request->imageid;
        $image = $request->images;

//        $pimage = $update_product->id;
        foreach ((array)$image as $key => $val) {

            $updateimage['product_id'] = $productid;

            if ($request->hasFile("images.$key")) {
                $file = $request->file("images.$key");
                $filename = date('Ymd') . $file->getClientOriginalName();
                $file->move(public_path('varient_image'), $filename);
                $updateimage['images'] = $filename;
            }


            DB::table('product_images')->where(['id' => $image_id[$key]])->update($updateimage);


        }

        //* upadate product images end *//


        return redirect()->route('product')->with('info', 'Product update successfully');
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
        $Product_delete = Product::find($id);
        $Product_delete->delete();
        return redirect()->route('product')->with('danger', 'product delete successfully');
    }
}
