@extends('admin.master.index')
@section('title')
    New Product
@endsection
@section('body')
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-center justify-content-between">
                            <span class="fw-bolder col-md-auto">New product</span>
                            <a href="{{route('product.index')}}"
                               class="col-md-auto btn btn-sm shadow-none btn-info text-bg-light fw-bolder">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('message'))
                            <p class="text-center text-success">{{session('message')}}</p>
                        @endif
                        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" class="">
                            @csrf
                            <div class="container">
                                <div class="row my-3">
                                    <label class="form-label col-md-4">Select Category</label>
                                    <div class="col-md-8">
                                        <select name="category_id" class="form-select shadow-none">
                                            <option disabled selected value>-- Select Category --</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('category_id'))
                                            <span class="text-danger">{{$errors->first('category_id')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <label class="form-label col-md-4">Select Subcategory</label>
                                    <div class="col-md-8">
                                        <select name="subcategory_id" class="form-select shadow-none">
                                            <option selected value>-- Select Subcategory --</option>
                                            @foreach($subcategories as $subcategory)
                                                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('subcategory_id'))
                                            <span class="text-danger">{{$errors->first('subcategory_id')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <label class="form-label col-md-4">Select Brand</label>
                                    <div class="col-md-8">
                                        <select name="brand_id" class="form-select shadow-none">
                                            <option selected value>-- Select Brand --</option>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('brand_id'))
                                            <span class="text-danger">{{$errors->first('brand_id')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <label class="form-label col-md-4">Select Unit</label>
                                    <div class="col-md-8">
                                        <select name="unit_id" class="form-select shadow-none">
                                            <option disabled selected value>-- Select Unit --</option>
                                            @foreach($units as $unit)
                                                <option value="{{$unit->id}}">{{$unit->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('unit_id'))
                                            <span class="text-danger">{{$errors->first('unit_id')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <label class="form-label col-md-4">Product Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control shadow-none" name="name" required>
                                        @if($errors->has('name'))
                                            <span class="text-danger">{{$errors->first('name')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <label class="form-label col-md-4">Stock Amount</label>
                                    <div class="col-md-8">
                                        <input type="number" class="form-control shadow-none" name="stock_amount" required>
                                        @if($errors->has('stock_amount'))
                                            <span class="text-danger">{{$errors->first('stock_amount')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <label class="form-label col-md-4">Reorder Label</label>
                                    <div class="col-md-8">
                                        <input type="number" class="form-control shadow-none" name="reorder_label" required>
                                        @if($errors->has('reorder_label'))
                                            <span class="text-danger">{{$errors->first('reorder_label')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <label class="form-label col-md-4">Product Regular Price</label>
                                    <div class="col-md-8">
                                        <input type="number" class="form-control shadow-none" name="regular_price">
                                        @if($errors->has('regular_price'))
                                            <span class="text-danger">{{$errors->first('regular_price')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <label class="form-label col-md-4">Product Selling Price</label>
                                    <div class="col-md-8">
                                        <input type="number" class="form-control shadow-none" name="selling_price" required>
                                        @if($errors->has('selling_price'))
                                            <span class="text-danger">{{$errors->first('selling_price')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <label class="form-label col-md-4">Product Short Description</label>
                                    <div class="col-md-8">
                                        <textarea name="short_description" class="form-control shadow-none"></textarea>
                                        @if($errors->has('short_description'))
                                            <span class="text-danger">{{$errors->first('short_description')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <label class="form-label col-md-4">Product Long Description</label>
                                    <div class="col-md-8">
                                        <textarea name="long_description" class="summernote"></textarea>
                                        @if($errors->has('long_description'))
                                            <span class="text-danger">{{$errors->first('long_description')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <label class="form-label col-md-4">Product Image</label>
                                    <div class="col-md-8">
                                        <input type="file" class="form-control shadow-none" accept="image/*"
                                               name="image">
                                        @if($errors->has('image'))
                                            <span class="text-danger">{{$errors->first('image')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <label class="form-label col-md-4">Other Images</label>
                                    <div class="col-md-8">
                                        <input type="file" class="form-control shadow-none" accept="image/*"
                                               name="other_images[]" multiple>
                                        @if($errors->has('other_images'))
                                            <span class="text-danger">{{$errors->first('other_images')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col-md-4"></div>
                                    <button class="col-md-8 shadow-none btn btn-success btn-sm" type="submit">Create new
                                        product
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
