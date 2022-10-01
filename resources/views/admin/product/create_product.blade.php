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

        <div class="card  " style="background-color:beige;">
            <div class="card-header">
                <b>Add Category</b>
            </div>
            <div class="card-body">
                <form action="{{route('store_product')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">NAME</label>
                            <input type="text" class="form-control" name="name" id="product_name" placeholder="">
                            @error('name')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="slug">SLUG</label>
                            <input type="text" class="form-control" name="slug" id="product_slug" placeholder="">
                            @error('slug')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="category_id">CATEGORY</label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option>Select Category</option>
                                @foreach($categorys as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="image">IMAGE</label>
                            <input type="file" class="form-control" name="image" id="image">
                            @error('image')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="brand">BRAND</label>
                            <select class="form-control" name="brand" id="brnad_name">
                                <option>Select Brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="model">MODEL</label>
                            <input type="text" class="form-control" name="model" id="model" placeholder="">
                            @error('model')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="short_desc">SHORT DESCRIPTION</label>
                            <textarea type="text" class="form-control" name="short_desc" id="short_desc"
                                      placeholder=""></textarea>
                            @error('short_desc')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="description">DESCRIPTION</label>
                            <textarea type="text" class="form-control" name="desc" id="description"
                                      placeholder=""></textarea>
                            @error('description')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="keywords">KEYWORDS</label>
                            <input type="text" class="form-control" name="keywords" id="keywords" placeholder="">
                            @error('keywords')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="technical_specification">TECHNICAL_SPECIFICATION</label>
                            <textarea type="text" class="form-control" name="technical_specification"
                                      id="technical_specification" placeholder=""></textarea>
                            @error('technical_specification')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="uses">USES</label>
                            <input type="text" class="form-control" name="uses" id="uses" placeholder="">
                            @error('Uses')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="warranty">WARRANTY</label>
                            <input type="text" class="form-control" name="warranty" id="warranty" placeholder="">
                            @error('warranty')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="lead_time">Lead Time</label>
                            <input type="text" class="form-control" name="lead_time" id="lead_time" placeholder="">
                            @error('lead_time')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tax">Tax</label>
                            <select class="form-control" name="tax_id" id="tax">
                                <option>Select Tax</option>
                                @foreach($taxes as $tax)
                                    <option value="{{$tax->id}}">{{$tax->tax_desc}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tax_type">Tax Type</label>
                            <input type="text" class="form-control" name="tax_type" id="tax_type" placeholder="">
                            @error('tax_type')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="is_promo">Promo</label>
                            <select class="form-control" name="is_promo" id="is_promo">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="is_featured">Featured</label>
                            <select class="form-control" name="is_featured" id="is_featured">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="is_discounted">Discount</label>
                            <select class="form-control" name="is_discounted" id="is_discounted">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="is_tranding">Tranding</label>
                            <select class="form-control" name="is_tranding" id="is_tranding">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>


                    <h2 class="mb-4"><strong>Product Images</strong></h2>
                    <div class="card product_images">
                        <input id="imageid" type="hidden" name="id[]">
                        <div class="card-body">
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="images">IMAGE</label>
                                        <input type="file" class="form-control" name="images[]" id="images"
                                               placeholder="">
                                        @error('images')
                                        <span style="color:red">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <button type="button" class="btn btn-success images_btn"><i
                                        class="fas fa-plus">&nbsp;</i>ADD
                                </button>

                            </div>
                        </div>
                    </div>

                    <h2 class="mb-4"><strong>Product Attribute</strong></h2>
                    <div class="card-body product_attr">
                        <input id="paid" type="hidden" name="id[]">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="sku">SKU</label>
                                <input type="text" class="form-control" name="sku[]" id="sku" placeholder="">
                                @error('sku')
                                <span style="color:red">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="mrp">MRP</label>
                                <input type="text" class="form-control" name="mrp[]" id="mrp" placeholder="">
                                @error('mrp')
                                <span style="color:red">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="price">PRICE</label>
                                <input type="text" class="form-control" name="price[]" id="price" placeholder="">
                                @error('price')
                                <span style="color:red">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="size_id">SIZE</label>
                                <select class="form-control" name="size_id[]" id="size_id">
                                    <option>Select Size</option>
                                    @foreach($sizes as $size)
                                        <option value="{{$size->id}}">{{$size->size}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="color_id">COLOR</label>
                                <select class="form-control" name="color_id[]" id="color_id">
                                    <option>Select Color</option>
                                    @foreach($colors as $color)
                                        <option value="{{$color->id}}">{{$color->color}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="qty">QTY</label>
                                <input type="text" class="form-control" name="qty[]" id="qty" placeholder="">
                                @error('qty')
                                <span style="color:red">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="attr_image">IMAGE</label>
                                <input type="file" class="form-control" name="attr_image[]" id="attr_image"
                                       placeholder="">
                                @error('attr_image')
                                <span style="color:red">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <button type="button" class="btn btn-success product_btn"><i class="fas fa-plus">&nbsp;</i>ADD
                            </button>

                        </div>
                    </div>
                    <div class="form-group" style="margin-top:30px;">
                        <button type="submit" class=" form-control btn btn-" style="background-color:#c56b1f">Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('scripts')

    <!-----product attr add multi attribute start----->
    <script>
        $(document).ready(function () {
            $(".product_btn").click(function () {
                var add_size = $('#size_id').html();
                var add_color = $('#color_id').html();
                $(".product_attr").append('<div class="card-body product_attr">\n' +
                    '    <div class="form-row">\n' +
                    '        <div class="form-group col-md-2">\n' +
                    '            <label for="sku">SKU</label>\n' +
                    '            <input type="text" class="form-control" name="sku[]" id="sku" placeholder="">\n' +
                    '           \n' +
                    '            <span style="color:red"></span>\n' +
                    '       \n' +
                    '        </div>\n' +
                    '        <div class="form-group col-md-2">\n' +
                    '            <label for="mrp">MRP</label>\n' +
                    '            <input type="text" class="form-control" name="mrp[]" id="mrp" placeholder="">\n' +
                    '       \n' +
                    '            <span style="color:red"></span>\n' +
                    '        \n' +
                    '        </div>\n' +
                    '        <div class="form-group col-md-2">\n' +
                    '            <label for="price">PRICE</label>\n' +
                    '            <input type="text" class="form-control" name="price[]" id="price" placeholder="">\n' +
                    '       \n' +
                    '            <span style="color:red"></span>\n' +
                    '      \n' +
                    '        </div>\n' +
                    '        <div class="form-group col-md-2">\n' +
                    '            <label for="size_id">SIZE</label>\n' +
                    '            <select id="size_id" name="size_id[]" class="form-control">' + add_size + '</select>\n' +
                    '        </div>\n' +
                    '        <div class="form-group col-md-2">\n' +
                    '            <label for="color_id">COLOR</label>\n' +
                    '            <select id="color_id" name="color_id[]" class="form-control">' + add_color + '</select>\n' +
                    '        </div>\n' +
                    '    </div>\n' +
                    '    <div class="form-row">\n' +
                    '        <div class="form-group col-md-3">\n' +
                    '            <label for="qty">QTY</label>\n' +
                    '            <input type="text" class="form-control" name="qty[]" id="qty" placeholder="">\n' +
                    '          \n' +
                    '        </div>\n' +
                    '        <div class="form-group col-md-3">\n' +
                    '            <label for="attr_image">IMAGE</label>\n' +
                    '            <input type="file" class="form-control" name="attr_image[]" id="attr_image"\n' +
                    '                   placeholder="">\n' +
                    '           \n' +
                    '        </div>\n' +
                    '    </div>\n' +
                    '    <div class="form-group col-md-3">\n' +
                    '        <button type="button" class="btn btn-danger btn_remove" onclick="return remove_item(this);" ><i class="fas fa-trash"></i></button>\n' +
                    '    </div>\n' +
                    '</div>');
            });
        });
    </script>
    <script>
        function remove_item(mi) {
            $(mi).closest('.product_attr').remove();
            // $('#tr'+mi+'_'+si).remove();
        }
    </script>
    <!-----product attr add multi attribute ends----->


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
