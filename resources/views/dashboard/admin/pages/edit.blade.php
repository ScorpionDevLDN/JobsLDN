@extends('AdminDashboard.index')
@section('title','Edit Page')
@section('breadcrumb')
    <a href="{{route('admin.pages.index')}}" class="btn">Pages</a>
    <a href="#" class="btn">Edit Page: {{$dynamicPage->title}}</a>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title">Edit Page</h3>
                    </div>
                    <!--begin::Form-->
                    <form enctype="multipart/form-data" action="{{route('admin.pages.update',$dynamicPage->id)}}"
                          method="post">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Title</label>
                                <div class="col-9">
                                    <input value="{{$dynamicPage->title}}" name="title" class="form-control" type="text"
                                           id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Image</label>
                                <div class="form-group col-9">
                                    <div class="custom-file">
                                        <input name="image" type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        <span class="text-danger">@error('image'){{ $message }}@enderror</span>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-3 col-form-label">Description</label>
                                <div class="col-lg-9">
                                    {{--                                    <textarea class="summernote" name="description"></textarea>--}}
                                    <textarea id="description" rows='5' name="description" placeholder="description"
                                              class="form-control">{{$dynamicPage->description}}</textarea>
                                    <span class="text-danger">@error('description'){{ $message }}@enderror</span>
                                </div>

                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-3 col-form-label">Content</label>
                                <div class="col-lg-9">
                            <textarea id="content" rows='8' name="content" placeholder="description"
                                      class="form-control summernote">{!! $dynamicPage->content !!}</textarea>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">KeyWords</label>
                                <div class="col-9">
                                    <input value="{{$dynamicPage->keywords}}" name="keywords" class="form-control"
                                           type="text" id="keyword">
                                    <h6 class="text-muted"><small>Enter Keywords comma separated</small></h6>
                                    <span class="text-danger">@error('keywords'){{ $message }}@enderror</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Slug</label>
                                <div class="col-9">
                                    <input value="{{$dynamicPage->slug}}" name="slug" class="form-control" type="text"
                                           id="example-text-input">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Metadata</label>
                                <div class="col-9">
                                    <input value="{{$dynamicPage->metadata}}" name="metadata" class="form-control"
                                           type="text" id="example-text-input">
                                </div>
                            </div>

                            <div class="m-form__group form-group row">
                                <label class=" col-lg-3 col-form-label">Shown In:</label>
                                <div class="col-lg-6 radio-list">
                                    <label class="radio">
                                        <input {{value($dynamicPage->shown_in)=='1'?"checked":""}} value="1"
                                               type="radio" name="shown_in">
                                        <span></span>Header</label>
                                    <label class="radio">
                                        <input {{value($dynamicPage->shown_in)=='0'?"checked":""}} value="0"
                                               type="radio" name="shown_in">
                                        <span></span>Footer</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-9">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <a href="{{route('admin.pages.index')}}" class="btn btn-secondary">Cancel</a>
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

@section('js')
    {{--    <script src="{{ asset('assets/js/pages/crud/forms/editors/summernote.js') }}" type="text/javascript"></script>--}}
    <script type="text/javascript">
        $(document).ready(function() {
            // $('.summernote').summernote();
            $('.summernote').summernote('code');
        });
    </script>
@endsection