<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductAttr;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $categories = Category::with('proitem')->get();

        $discount_product = Product::where(['is_discounted' => 1])->get();
        $featured_product = Product::where(['is_featured' => 1])->get();
        $tranding_product = Product::where(['is_tranding' => 1])->get();


        $brand = DB::table('brands')
            ->where(['status' => 1])
            ->get();

        $banner = DB::table('banners')
            ->where(['status' => 1])
            ->get();


        return view('front.front_dash', compact(['categories', 'brand', 'banner', 'discount_product', 'featured_product', 'tranding_product']));
    }

    public function category(Request $request,$slug)
    {

        $sort="";
        $sort_txt="";
        $filter_price_start="";
        $filter_price_end="";
        $color_filter="";
        $colorFilterArr=[];
        if($request->get('sort')!==null){
            $sort=$request->get('sort');

        }

        $query=DB::table('products');
        $query=$query->leftJoin('categories','categories.id','=','products.category_id');
        $query=$query->leftJoin('products_attr','products.id','=','products_attr.product_id');
        $query=$query->where(['products.status'=>1]);

        $query=$query->where(['categories.category_slug'=>$slug]);

        if($sort=='name'){
            $query=$query->orderBy('products.name','asc')->get();
            $sort_txt="Product Name";
            dd($sort_txt);

        }
        if($sort=='date'){
            $query=$query->orderBy('products.id','desc');
            $sort_txt="Date";
        }
        if($sort=='price_desc'){
            $query=$query->orderBy('products_attr.price','desc');
            $sort_txt="Price - DESC";
        }if($sort=='price_asc'){
        $query=$query->orderBy('products_attr.price','asc');
        $sort_txt="Price - ASC";
    }

        if($request->get('filter_price_start')!==null && $request->get('filter_price_end')!==null){
            $filter_price_start=$request->get('filter_price_start');
            $filter_price_end=$request->get('filter_price_end');

            if($filter_price_start>0 && $filter_price_end>0){
                $query=$query->whereBetween('products_attr.price',[$filter_price_start,$filter_price_end]);

            }
        }

        if($request->get('color_filter')!==null){
            $color_filter=$request->get('color_filter');
            $colorFilterArr=explode(":",$color_filter);
            $colorFilterArr=array_filter($colorFilterArr);

            $query=$query->where(['products_attr.color_id'=>$request->get('color_filter')]);

        }

        $query=$query->distinct()->select('products.*');
        $query=$query->get();
        $result['product']=$query;

        foreach($result['product'] as $list1){

            $query1=DB::table('products_attr');
            $query1=$query1->leftJoin('sizes','sizes.id','=','products_attr.size_id');
            $query1=$query1->leftJoin('colors','colors.id','=','products_attr.color_id');
            $query1=$query1->where(['products_attr.product_id'=>$list1->id]);
            $query1=$query1->get();
            $result['product_attr'][$list1->id]=$query1;


        }

        $colors=DB::table('colors')
            ->where(['status'=>1])
            ->get();

        $categories_list=DB::table('categories')
            ->where(['status'=>1])
            ->get();

        $result['slug']=$slug;
        $result['sort']=$sort;
        $result['sort_txt']=$sort_txt;
        $result['filter_price_start']=$filter_price_start;
        $result['filter_price_end']=$filter_price_end;
        $result['color_filter']=$color_filter;
        $result['colorFilterArr']=$colorFilterArr;

        return view('front.category',$result,compact('colors','categories_list'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product(Request $request, $slug)
    {
        $product =
            DB::table('products')
                ->where(['status' => 1])
                ->where(['slug' => $slug])
                ->get();

        foreach ($product as $list1) {
            $product_attr[$list1->id] =
                DB::table('products_attr')
                    ->leftJoin('sizes', 'sizes.id', '=', 'products_attr.size_id')
                    ->leftJoin('colors', 'colors.id', '=', 'products_attr.color_id')
                    ->where(['products_attr.product_id' => $list1->id])
                    ->get();

        }

        foreach ($product as $list1) {
            $product_images[$list1->id] =
                DB::table('product_images')
                    ->where(['product_images.product_id' => $list1->id])
                    ->get();
        }
        $related_product =
            DB::table('products')
                ->where(['status' => 1])
                ->where('slug', '!=', $slug)
                ->where(['category_id' => $product[0]->category_id])
                ->get();
        foreach ($product as $list1) {
            $related_product_attr[$list1->id] =
                DB::table('products_attr')
                    ->leftJoin('sizes', 'sizes.id', '=', 'products_attr.size_id')
                    ->leftJoin('colors', 'colors.id', '=', 'products_attr.color_id')
                    ->where(['products_attr.product_id' => $list1->id])
                    ->get();
        }

//        $result['product_review']=
//            DB::table('product_review')
//                ->leftJoin('customers','customers.id','=','product_review.customer_id')
//                ->where(['product_review.products_id'=>$result['product'][0]->id])
//                ->where(['product_review.status'=>1])
//                ->orderBy('product_review.added_on','desc')
//                ->select('product_review.rating','product_review.review','product_review.added_on','customers.name')
//                ->get();


        return view('front.product', compact('product','product_attr','product_images','related_product_attr','related_product'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */



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
    }
}
