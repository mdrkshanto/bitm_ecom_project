@extends('admin.master.index')
@section('title')
    New Unit
@endsection
@section('body')
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-center justify-content-between">
                            <span class="fw-bolder col-md-auto">New unit</span>
                            <a href="{{route('unit.index')}}"
                               class="col-md-auto btn btn-sm shadow-none btn-info text-bg-light fw-bolder">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('message'))
                            <p class="text-center text-success">{{session('message')}}</p>
                        @endif
                        <form action="{{route('unit.store')}}" method="POST" class="">
                            @csrf
                            <div class="container">
                                <div class="row my-3">
                                    <label class="form-label col-md-4">Unit Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control shadow-none" name="name" required>
                                        @if($errors->has('name'))
                                            <span class="text-danger">{{$errors->first('name')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <label class="form-label col-md-4">Unit Description</label>
                                    <div class="col-md-8">
                                        <textarea name="description" class="form-control shadow-none"></textarea>
                                        @if($errors->has('description'))
                                            <span class="text-danger">{{$errors->first('description')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-md-4"></div>
                                    <button class="col-md-8 shadow-none btn btn-success btn-sm" type="submit">Create new
                                        unit
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
