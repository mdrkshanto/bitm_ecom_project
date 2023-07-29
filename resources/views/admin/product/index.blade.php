@extends('admin.master.index')
@section('title')
    Product List
@endsection
@section('body')
    <section class="section">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <div class="row align-center justify-content-between">
                            <span class="col-md-auto  fw-bolder">Product List</span>
                            <a href="{{route('product.create')}}"
                               class="btn btn-sm btn-info shadow-none bg-transparent text-bg-light col-md-auto fw-bolder">Add
                                new</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('message'))
                            <p class="text-center text-success">{{session('message')}}</p>
                    @endif

                    <!-- Table with stripped rows -->
                        <table class="table datatable table-sm text-center align-middle table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="align-middle">#</th>
                                <th class="align-middle">Code</th>
                                <th class="align-middle">Name</th>
                                <th class="align-middle">Image</th>
                                <th class="align-middle">Stock Amount</th>
                                <th class="align-middle">Featured Status</th>
                                <th class="align-middle">Status</th>
                                <th class="align-middle">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td class="align-middle">{{$loop->iteration}}</td>
                                    <td class="align-middle">{{$product->code}}</td>
                                    <td class="align-middle">{{$product->name}}</td>
                                    <td class="align-middle">
                                        @if($product->image)
                                            <img src="{{asset($product->image)}}" alt="" class="" width="80"
                                                 height="50">
                                    @endif
                                    <td class="align-middle">{{$product->stock_amount}}</td>
                                    </td>
                                    <td class="align-middle">{{$product->featured_status == 1 ? 'Active' : 'Inactive'}}</td>
                                    <td class="align-middle">{{$product->status == 1 ? 'Active' : 'Inactive'}}</td>
                                    <td class="align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{route('product.show', $product->slug)}}"
                                               class="btn btn-info shadow-none"><i class="bi bi-book"></i></a>
                                            <a href="{{route('product.edit', $product->slug)}}"
                                               class="btn btn-warning shadow-none"><i class="bi bi-pencil-square"></i></a>
                                            <form action="{{route('product.destroy',$product->id)}}" method="POST">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-danger shadow-none" type="submit"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
