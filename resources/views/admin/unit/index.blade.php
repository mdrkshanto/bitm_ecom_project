@extends('admin.master.index')
@section('title')
    Unit
@endsection
@section('body')
    <section class="section">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <div class="row align-center justify-content-between">
                            <span class="col-md-auto  fw-bolder">Unit List</span>
                            <a href="{{route('unit.create')}}"
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
                                <th scope="col" class="align-middle">#</th>
                                <th scope="col" class="align-middle">Name</th>
                                <th scope="col" class="align-middle">Slug</th>
                                <th scope="col" class="align-middle">Description</th>
                                <th scope="col" class="align-middle">Status</th>
                                <th scope="col" class="align-middle">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($units as $unit)
                                <tr>
                                    <td class="align-middle">{{$loop->iteration}}</td>
                                    <td class="align-middle">{{$unit->name}}</td>
                                    <td class="align-middle">{{$unit->slug}}</td>
                                    <td class="align-middle">{{$unit->description}}</td>
                                    <td class="align-middle">{{$unit->status == 1 ? 'Active' : 'Inactive'}}</td>
                                    <td class="align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{route('unit.edit', $unit->slug)}}"
                                               class="btn btn-info shadow-none"><i class="bi bi-pencil-square"></i></a>
                                            <form action="{{route('unit.destroy',$unit->id)}}"
                                                  method="POST">@csrf @method('DELETE')
                                                <button class="btn btn-sm btn-danger" type="submit"><i
                                                        class="bi bi-trash"></i></button>
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
