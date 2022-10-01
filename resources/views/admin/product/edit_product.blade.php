@extends('layouts.master')
@section('title')
    Product
@endsection

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{route('product')}}">
                        <button type="button" class="btn  btn-outline-success float-right">Back</button>
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container col-md-12 width=100% mt-2">

        <div class="card " style="background-color:beige;">
            <div class="card-header">
                <b>Edit Category</b>
            </div>
            <div class="card-body">
                <form action="{{route('update_product',$edit_product->id)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="product_name"
                                   value="{{$edit_product->name}}">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" name="slug" id="product_slug"
                                   value="{{$edit_product->slug}}">

                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="category_id">Category</label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option>Category select
                                </option>
                                @foreach($edit_category as $edit_drop)
                                    <option
                                        value="{{$edit_drop->id}}"{{$edit_product->category_id == $edit_drop->id  ? 'selected' : ''}}>{{$edit_drop->category_name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" id="image">
                            <img src="{{asset('main_image/'.$edit_product->image)}}" width="50px">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="brand">Brand</label>
                            <select class="form-control" name="brand" id="brnad_name">
                                <option>Select Brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}" {{$edit_product->brand == $brand->id  ? 'selected' : ''}}>{{$brand->name}}</option>

                                @endforeach
                            </select>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="model">Model</label>
                            <input type="text" class="form-control" name="model" id="model"
                                   value="{{$edit_product->model}}">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="short_desc">Short Description</label>
                            <textarea type="text" class="form-control" name="short_desc" id="short_desc">
                                   {{$edit_product->short_desc}}</textarea>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="desc">Description</label>
                            <textarea type="text" class="form-control" name="desc" id="desc"
                            >{{$edit_product->desc}}</textarea>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="keywords">Keywords</label>
                            <input type="text" class="form-control" name="keywords" id="keywords"
                                   value="{{$edit_product->keywords}}">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="technical_specification">Technical_Specification</label>
                            <textarea type="text" class="form-control" name="technical_specification"
                                      id="technical_specification">{{$edit_product->technical_specification}}</textarea>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="uses">Uses</label>
                            <input type="text" class="form-control" name="uses" id="uses"
                                   value="{{$edit_product->uses}}">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="warranty">Warranty</label>
                            <input type="text" class="form-control" name="warranty" id="warranty"
                                   value="{{$edit_product->warranty}}">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="lead_time">Lead Time</label>
                            <input type="text" class="form-control" name="lead_time" id="lead_time" placeholder=""
                                   value="{{$edit_product->lead_time}}">
                            @error('lead_time')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tax">Tax</label>
                            <select class="form-control" name="tax_id" id="tax">
                                <option>Select Tax</option>
                                @foreach($edit_taxs as $tax)

                                    <option value="{{$tax->id}}" {{$edit_product->tax_id == $tax->id  ? 'selected' : ''}}>{{$tax->tax_desc}}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tax_type">Tax Type</label>
                            <input type="text" class="form-control" name="tax_type" id="tax_type" placeholder=""
                                   value="{{$edit_product->tax_type}}">
                            @error('tax_type')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="is_promo">Promo</label>
                            <select class="form-control" name="is_promo" id="is_promo">
                                @if($edit_product->is_promo=='1')
                                    <option value="1" selected>Yes</option>
                                    <option value="0">No</option>
                                @else
                                    <option value="1">Yes</option>
                                    <option value="0" selected>No</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="is_featured">Featured</label>
                            <select class="form-control" name="is_featured" id="is_featured">
                                @if($edit_product->is_featured =='1')
                                    <option value="1" selected>Yes</option>
                                    <option value="0">No</option>
                                @else
                                    <option value="1">Yes</option>
                                    <option value="0" selected>No</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="is_discounted">Discount</label>
                            <select class="form-control" name="is_discounted" id="is_discounted">
                                @if($edit_product->is_discounted=='1')
                                    <option value="1" selected>Yes</option>
                                    <option value="0">No</option>
                                @else
                                    <option value="1">Yes</option>
                                    <option value="0" selected>No</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="is_tranding">Tranding</label>
                            <select class="form-control" name="is_tranding" id="is_tranding">
                                @if($edit_product->is_tranding=='1')
                                    <option value="1" selected>Yes</option>
                                    <option value="0">No</option>
                                @else
                                    <option value="1">Yes</option>
                                    <option value="0" selected>No</option>
                                @endif
                            </select>
                        </div>
                    </div>


                    <h2 class="mb-4"><strong>Product Images</strong></h2><span> <div class="form-group col-md-3">
                                    <button type="button" class="btn btn-success images_btn"><i
                                            class="fas fa-plus">&nbsp;</i>ADD
                                    </button>

                                </div></span>
                    <div class="card product_images">
                        @foreach($productAttrimages as $key=>$val)
                            @php

                                $piArr=(array)$val;
                            @endphp
                            <input id="image_id" type="hidden" name="imageid[]" value="{{$piArr['id']}}">

                            <div class="card-body">
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="images">IMAGE</label>
                                            <input type="file" class="form-control" name="images[]" id="images"
                                                   placeholder="">
                                            <img src="{{asset('varient_image/'.$piArr['images']) }}" width="50px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <h2 class="mb-4"><strong>Product Attribute</strong>
                        <div class="form-group col-md-3 float-right">
                            <button type="button" class="btn btn-success product_btn"><i
                                    class="fas fa-plus">&nbsp;</i>ADD
                            </button>
                        </div>
                    </h2>
                    <div class="card-body">


                        @foreach($productAttrArr as $key=>$val)
                            @php

                                $pAArr=(array)$val;
                            @endphp
                            <input id="pid" type="hidden" name="id[]" value="{{$pAArr['id']}}">

                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="sku">SKU</label>
                                    <input type="text" class="form-control" name="sku[]" id="sku"
                                           value="{{$pAArr['sku']}}">
                                    @error('sku')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="mrp">MRP</label>
                                    <input type="text" class="form-control" name="mrp[]" id="mrp"
                                           value="{{$pAArr['mrp']}}">
                                    @error('mrp')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="price">PRICE</label>
                                    <input type="text" class="form-control" name="price[]" id="price"
                                           value="{{$pAArr['price']}}">
                                    @error('price')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="size_id">SIZE</label>
                                    <select class="form-control" name="size_id[]" id="size_id">
                                        <option value="">Select</option>
                                        @foreach($edit_sizes as $size)

                                                <option value="{{$size->id}}" {{$pAArr['size_id'] == $size->id  ? 'selected' : ''}}>{{$size->size}}</option>

                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="color_id">COLOR</label>
                                    <select class="form-control" name="color_id[]" id="color_id">
                                        <option value="">Select</option>
                                        @foreach($edit_colors as $color)

                                                <option value="{{$color->id}}" {{$pAArr['color_id'] == $color->id  ? 'selected' : ''}}>{{$color->color}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="qty">QTY</label>
                                    <input type="text" class="form-control" name="qty[]" id="qty"
                                           value="{{$pAArr['qty']}}">
                                    @error('qty')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="attr_image">IMAGE</label>
                                    <input type="file" class="form-control" name="attr_image[]" id="attr_image"
                                           placeholder="">
                                    <img src="{{asset('attrimage/'.$pAArr['attr_image'])}}" width="50px">
                                </div>
                            </div>

                    </div>
                @endforeach

            </div>

            <button type="submit" class=" form-control btn btn-" style="background-color:#c56b1f">Update</button>


            </form>
        </div>
    </div>
    </div>
    </div>
@endsection
@push('scripts')
    <!------ckeditor-->
    <script>
        CKEDITOR.replace('short_desc');
        CKEDITOR.replace('desc');
        CKEDITOR.replace('technical_specification');
    </script>
    <!------ end ckeditor-->

    <!----------multi-image add with script---->
    <script>
        $(document).ready(function () {
            $(".images_btn").click(function () {
                $(".product_images").append('<div class="card product_images">\n' +
                    '<div class="card-body">\n' +
                    '<div class="form-group">\n' +
                    '<div class="row">\n' +
                    '<div class=" col-md-3 ">\n' +
                    '<label for="attr_image">IMAGE</label>\n' +
                    '<input type="file" class="form-control" name="images[]" id="images" placeholder = "" >\n' +
                    ' </div>\n' +
                    '</div>\n' +
                    '</div>\n' +
                    ' <div class="form-group col-md-3">\n' +
                    '<button type="button" class="btn btn-danger btn_remove" onclick="return remove_images(this);" ><i class="fas fa-trash"></i></button>\n' +
                    ' </div>\n' +
                    '</div>\n' +
                    '</div>');
            });
        });
    </script>
    <script>
        function remove_images(mi) {
            $(mi).closest('.product_images').remove();
            // $('#tr'+mi+'_'+si).remove();
        }
    </script>
    <!------ end multi-image add with script-->
@endpush
