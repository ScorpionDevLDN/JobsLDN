@extends('AdminDashboard.index')
@section('title','Pages')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title">Add New Page</h3>
                    </div>
                    <!--begin::Form-->
                    <form enctype="multipart/form-data" action="{{route('admin.pages.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Title</label>
                                <div class="col-9">
                                    <input value="{{old('title')}}"  name="title" class="form-control" type="text"  id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Image</label>
                                <div class="form-group col-9">
                                    <div class="custom-file">
                                        <input name="image" type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group m-form__group row">
                                <label class="col-lg-3 col-form-label">Content</label>
                                <div class="col-lg-9">
                            <textarea id="content" rows='8' name="content" placeholder="description"
                                      class="form-control">{{old("content")}}</textarea>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Slug</label>
                                <div class="col-9">
                                    <input value="{{old('slug')}}"  name="slug" class="form-control" type="text"  id="example-text-input">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Metadata</label>
                                <div class="col-9">
                                    <input value="{{old('metadata')}}"  name="metadata" class="form-control" type="text"  id="example-text-input">
                                </div>
                            </div>

                            <div class="m-form__group form-group row">
                                <label class=" col-lg-3 col-form-label">Shown In:</label>
                                <div class="col-lg-6 radio-list">
                                        <label class="radio">
                                            <input {{old('shown_in')=='1'?"checked":""}} value="1" type="radio" name="shown_in">
                                            <span></span>Header</label>
                                    <label class="radio">
                                        <input {{old('shown_in')=='0'?"checked":""}} value="0" type="radio" name="shown_in">
                                        <span></span>Footer</label>
                                </div>
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