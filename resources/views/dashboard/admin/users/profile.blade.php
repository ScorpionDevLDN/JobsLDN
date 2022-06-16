@extends('AdminDashboard.index')
@section('breadcrumb')
    <a href="#" class="btn">Users</a>
    <a href="#" class="btn">Admin Profile</a>
@endsection
@section('title','Profile')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">Admins
                                <div class="text-muted pt-2 font-size-sm"></div>
                            </h3>
                        </div>
                    </div>
                    <form enctype="multipart/form-data" action="{{route('admin.profile.update')}}" method="post">
                        @method('put')
                        @csrf
                        <div class="card-body table-responsive">
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Personal Image</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="image-input image-input-outline image-input-circle" id="kt_image_3">
                                        <div class="image-input-wrapper" style="background-image: url({{$user->image}})"></div>
                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg">
                                            <input type="hidden" name="image">
                                        </label>
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
															<i class="ki ki-bold-close icon-xs text-muted"></i>
														</span>
                                    </div>
{{--                                    <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>--}}
                                </div>
                                {{--                                <div class="form-group col-9">--}}
                                {{--                                    <div class="custom-file">--}}
                                {{--                                        <input name="image" type="file" class="custom-file-input" id="customFile">--}}
                                {{--                                        <label class="custom-file-label" for="customFile">Choose file</label>--}}
                                {{--                                        <span class="text-danger">@error('image'){{ $message }}@enderror</span>--}}
                                {{--                                        <img src="{{$user->image}}" alt="" style="width:auto; height:100px;" id="display_user_image"/>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Admin Name</label>
                                <div class="col-9">
                                    <input value="{{auth('admins')->user()->name}}" name="name" class="form-control"
                                           type="text" id="example-text-input">
                                    <span class="text-danger">@error('name'){{ $message }}@enderror</span>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label">Admin Email</label>
                                <div class="col-9">
                                    <input disabled value="{{auth('admins')->user()->email}}" name="email" class="form-control" type="text"
                                           id="example-text-input">
                                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>

                                </div>
                            </div>



                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-9">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <a href="{{route('admin.home')}}" type="button" class="button btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">Update Password
                                <div class="text-muted pt-2 font-size-sm"></div>
                            </h3>
                        </div>
                    </div>
                    <form enctype="multipart/form-data" action="{{route('admin.updatePassword')}}" method="post">
                        @method('put')
                        @csrf
                        <div class="card-body table-responsive">
                            <div class="form-group row">
                                <label class="col-12 col-form-label">Current Password</label>
                                <div class="col-12">
                                    <input required name="password" class="form-control"
                                           type="password" id="example-text-input">
                                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-form-label">New Password</label>
                                <div class="col-12">
                                    <input required  name="new_password" class="form-control"
                                            type="password" id="example-text-input">
                                    <span class="text-danger">@error('new_password'){{ $message }}@enderror</span>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-form-label">Confirm Password</label>
                                <div class="col-12">
                                    <input required  name="new_password_confirmation" class="form-control"
                                            type="password" id="example-text-input">
                                    <span class="text-danger">@error('new_password_confirmation'){{ $message }}@enderror</span>

                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-9">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <a href="{{route('admin.home')}}" type="button" class="button btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/js/pages/crud/file-upload/image-input.js')}}"></script>
@endsection

