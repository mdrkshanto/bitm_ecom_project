@extends('admin.master.index')
@section('title')
    Product Detail
@endsection
@section('body')
    <section class="section">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <div class="row align-center justify-content-between">
                            <span class="col-md-auto  fw-bolder">Show Product Detail</span>
                            <a href="{{route('product.index')}}"
                               class="btn btn-sm btn-info shadow-none bg-transparent text-bg-light col-md-auto fw-bolder">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('message'))
                            <p class="text-center text-success">{{session('message')}}</p>
                    @endif

                    <!-- Table with stripped rows -->
                        <table class="table table-sm text-center align-middle table-striped table-hover">
                            <tr>
                                <th>Product Code</th>
                                <td>{{$product->code}}</td>
                            </tr>
                            <tr>
                                <th>Product Name</th>
                                <td>{{$product->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Slug</th>
                                <td>{{$product->slug}}</td>
                            </tr>
                            <tr>
                                <th>Product Category</th>
                                <td>{{$product->category->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Subcategory</th>
                                <td>{{$product->subcategory ? $product->subcategory->name : 'Nothing'}}</td>
                            </tr>
                            <tr>
                                <th>Product Brand</th>
                                <td>{{$product->brand ? $product->brand->name : 'Nothing'}}</td>
                            </tr>
                            <tr>
                                <th>Product Unit</th>
                                <td>{{$product->unit->name}}</td>
                            </tr>
                            <tr>
                                <th>Short Description</th>
                                <td>{!! $product->short_description !!}</td>
                            </tr>
                            <tr>
                                <th>Long Description</th>
                                <td>{!! $product->long_description !!}</td>
                            </tr>
                            <tr>
                                <th>Regular Price</th>
                                <td>{{ $product->regular_price }}</td>
                            </tr>
                            <tr>
                                <th>Selling Price</th>
                                <td>{{ $product->selling_price }}</td>
                            </tr>
                            <tr>
                                <th>Stock Amount</th>
                                <td>{{ $product->stock_amount }}</td>
                            </tr>
                            <tr>
                                <th>Reorder Label</th>
                                <td>{{ $product->reorder_label }}</td>
                            </tr>
                            <tr>
                                <th>Main Image</th>
                                <td><img src="{{asset($product->image)}}" alt="" class="" width="80" height="50"></td>
                            </tr>
                            <tr>
                                <th>Other Images</th>
                                <td>
                                    @if($product->otherImages)
                                        @foreach($product->otherImages as $otherImage)
                                        <img src="{{asset($otherImage->image)}}" alt="" class="" width="80" height="50">
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Sales Count</th>
                                <td>{{ $product->sales_count }}</td>
                            </tr>
                            <tr>
                                <th>Hit Count</th>
                                <td>{{ $product->hit_count }}</td>
                            </tr>
                            <tr>
                                <th>Featured Status</th>
                                <td>{{ $product->featured_status == 1 ? 'Featured' : 'Non Featured' }}</td>
                            </tr>
                            <tr>
                                <th>Carousel Status</th>
                                <td>{{ $product->carousel_status == 1 ? 'Active' : 'Inactive' }}</td>
                            </tr>
                            <tr>
                                <th>Published Status</th>
                                <td>{{ $product->status == 1 ? 'Published' : 'Unpublished' }}</td>
                            </tr>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
