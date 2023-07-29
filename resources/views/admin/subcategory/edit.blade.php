@extends('admin.master.index')
@section('title')
    Edit Subcategory
@endsection
@section('body')
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-center justify-content-between">
                            <span class="fw-bolder col-md-auto">Edit subcategory</span>
                            <a href="{{route('subcategory.index')}}"
                               class="col-md-auto btn btn-sm shadow-none btn-info text-bg-light fw-bolder">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('message'))
                            <p class="text-center text-success">{{session('message')}}</p>
                        @endif
                        <form action="{{route('subcategory.update', $subcategory->id)}}" method="POST"
                              enctype="multipart/form-data" class="">
                            @method('PUT')
                            @csrf
                            <div class="container">
                                <div class="row my-3">
                                    <label class="form-label col-md-4">Select Category</label>
                                    <div class="col-md-8">
                                        <select name="category_id" class="form-select shadow-none">
                                            <option disabled>-- Select Category --</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" @selected($category->id == $subcategory->category->id)>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('category_id'))
                                            <span class="text-danger">{{$errors->first('category_id')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <label class="form-label col-md-4">Subcategory Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control shadow-none" name="name" required
                                               value="{{$subcategory->name}}">
                                        @if($errors->has('name'))
                                            <span class="text-danger">{{$errors->first('name')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <label class="form-label col-md-4">Subcategory Description</label>
                                    <div class="col-md-8">
                                        <textarea name="description"
                                                  class="form-control shadow-none">{{$subcategory->description}}</textarea>
                                        @if($errors->has('description'))
                                            <span class="text-danger">{{$errors->first('description')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <label class="form-label col-md-4">Subcategory Image</label>
                                    <div class="col-md-8">
                                        <input type="file" class="form-control shadow-none" accept="image/*"
                                               name="image">
                                        @if($subcategory->image)
                                            <img src="{{asset($subcategory->image)}}" alt="{{$subcategory->name}}"
                                                 class=""
                                                 width="80" height="50">
                                        @endif
                                        @if($errors->has('image'))
                                            <span class="text-danger">{{$errors->first('image')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Subcategory Status</label>
                                        <div class="row my-3 my-md-0">
                                            <div class="form-check col-md-auto">
                                                <input class="form-check-input shadow-none" type="radio"
                                                       id="statusActive" name="status" value="1"
                                                       @checked($subcategory->status
                                                == 1)>
                                                <label class="form-check-label" for="statusActive">Active</label>
                                            </div>

                                            <div class="form-check col-md-auto">
                                                <input class="form-check-input shadow-none" type="radio"
                                                       id="statusInactive" name="status" value="0"
                                                       @checked($subcategory->status
                                                == 0)>
                                                <label class="form-check-label"
                                                       for="statusInactive">Inactive</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Featured Status</label>
                                        <div class="row my-3 my-md-0">
                                            <div class="form-check col-md-auto">
                                                <input class="form-check-input shadow-none" type="radio"
                                                       id="featuredStatusActive" name="featured_status" value="1"
                                                       @checked($subcategory->featured_status == 1)>
                                                <label class="form-check-label"
                                                       for="featuredStatusActive">Active</label>
                                            </div>

                                            <div class="form-check col-md-auto">
                                                <input class="form-check-input shadow-none" type="radio"
                                                       id="featuredStatusInactive" name="featured_status" value="0"
                                                       @checked($subcategory->featured_status == 0)>
                                                <label class="form-check-label"
                                                       for="featuredStatusInactive">Inactive</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row my-3">
                                    <div class="col-md-4"></div>
                                    <button class="col-md-8 shadow-none btn btn-success btn-sm" type="submit">Create
                                        new
                                        subcategory
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
