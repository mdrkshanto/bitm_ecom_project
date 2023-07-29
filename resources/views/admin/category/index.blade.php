@extends('admin.master.index')
@section('title')
    Category
@endsection
@section('body')
    <section class="section">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <div class="row align-center justify-content-between">
                            <span class="col-md-auto  fw-bolder">Category List</span>
                            <a href="{{route('category.create')}}" class="btn btn-sm btn-info shadow-none bg-transparent text-bg-light col-md-auto fw-bolder">Add new</a>
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
                                <th scope="col" class="align-middle">#</th>
                                <th scope="col" class="align-middle">Name</th>
                                <th scope="col" class="align-middle">Slug</th>
                                <th scope="col" class="align-middle">Description</th>
                                <th scope="col" class="align-middle">Image</th>
                                <th scope="col" class="align-middle">Featured Status</th>
                                <th scope="col" class="align-middle">Status</th>
                                <th scope="col" class="align-middle">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td class="align-middle">{{$loop->iteration}}</td>
                                <td class="align-middle">{{$category->name}}</td>
                                <td class="align-middle">{{$category->slug}}</td>
                                <td class="align-middle">{{$category->description}}</td>
                                <td class="align-middle">
                                    @if($category->image)
                                        <img src="{{asset($category->image)}}" alt="" class="" width="80" height="50">
                                    @endif
                                </td>
                                <td class="align-middle">{{$category->featured_status == 1 ? 'Active' : 'Inactive'}}</td>
                                <td class="align-middle">{{$category->status == 1 ? 'Active' : 'Inactive'}}</td>
                                <td class="align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{route('category.edit', $category->slug)}}" class="btn btn-info shadow-none"><i class="bi bi-pencil-square"></i></a>
                                        <form action="{{route('category.destroy', $category->id)}}" method="POST">@csrf @method('DELETE') <button class="btn btn-danger shadow-none" type="submit"><i class="bi bi-trash"></i></button></form>
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
