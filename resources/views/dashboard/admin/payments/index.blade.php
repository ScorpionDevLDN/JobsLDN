@extends('AdminDashboard.index')
@section('breadcrumb')
    <a class="btn">Jobs</a>
    <a class="btn">Payment</a>
@endsection
@section('title','Payment')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title">Payment Settings</h3>
                    </div>
                    <!--begin::Form-->
                    <form enctype="multipart/form-data" action="{{route('admin.get-payments.update',1)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Title</label>
                                <div class="col-9">
                                    <input value="{{$payment->title}}"  name="title" class="form-control" type="text"  id="example-text-input">
                                    <span class="text-danger">@error('title'){{ $message }}@enderror</span>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Image</label>
                                <div class="form-group col-9">
                                    <div class="custom-file">
                                        <input name="image" type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        <img src="{{$payment->image}}" alt="">
                                        <span class="text-danger">@error('image'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Description</label>
                                <div class="col-9">
                                    <textarea rows="8"  name="description" class="form-control" type="text"  id="example-text-input">
                                        {{$payment->description}}
                                    </textarea>
                                    <span class="text-danger">@error('description'){{ $message }}@enderror</span>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Days Count</label>
                                <div class="col-9">
                                    <input value="{{$payment->days_count}}"  name="days_count" class="form-control" type="number"  id="example-text-input">
                                    <span class="text-danger">@error('days_count'){{ $message }}@enderror</span>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Text</label>
                                <div class="col-9">
                                    <input value="{{$payment->text}}"  name="text" class="form-control" type="text"  id="example-text-input">
                                    <span class="text-danger">@error('text'){{ $message }}@enderror</span>

                                </div>
                            </div>


                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-9">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <a href="{{route('admin.pages.index')}}" type="button" class="button btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
@endsection
