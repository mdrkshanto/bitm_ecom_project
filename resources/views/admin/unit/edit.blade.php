@extends('admin.master.index')
@section('title')
    Edit Unit
@endsection
@section('body')
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-center justify-content-between">
                            <span class="fw-bolder col-md-auto">Edit unit</span>
                            <a href="{{route('unit.index')}}"
                               class="col-md-auto btn btn-sm shadow-none btn-info text-bg-light fw-bolder">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('message'))
                            <p class="text-center text-success">{{session('message')}}</p>
                        @endif
                        <form action="{{route('unit.update', $unit->id)}}" method="POST" class="">
                            @method('PUT')
                            @csrf
                            <div class="container">
                                <div class="row my-3">
                                    <label class="form-label col-md-4">Unit Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control shadow-none" name="name" required
                                               value="{{$unit->name}}">
                                        @if($errors->has('name'))
                                            <span class="text-danger">{{$errors->first('name')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <label class="form-label col-md-4">Unit Description</label>
                                    <div class="col-md-8">
                                        <textarea name="description"
                                                  class="form-control shadow-none">{{$unit->description}}</textarea>
                                        @if($errors->has('description'))
                                            <span class="text-danger">{{$errors->first('description')}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row my-3">
                                        <label class="form-label col-md-4">Unit Status</label>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="form-check col-md-auto">
                                                    <input class="form-check-input shadow-none" type="radio"
                                                           id="statusActive" name="status" value="1" @checked($unit->status
                                                    == 1)>
                                                    <label class="form-check-label" for="statusActive">Active</label>
                                                </div>

                                                <div class="form-check col-md-auto">
                                                    <input class="form-check-input shadow-none" type="radio"
                                                           id="statusInactive" name="status" value="0" @checked($unit->status
                                                    == 0)>
                                                    <label class="form-check-label" for="statusInactive">Inactive</label>
                                                </div>
                                            </div>
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
