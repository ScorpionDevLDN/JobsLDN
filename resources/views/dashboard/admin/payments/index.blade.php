@extends('AdminDashboard.index')
@section('breadcrumb')
    <a class="btn">Jobs</a>
    <a class="btn">Payment</a>
@endsection
@section('title' ,'Settings')
@section('js')
    <script type="text/javascript">
        $('.settings-tab-opener').on('click', function () {
            $('.settings-tab-opener').removeClass('active');
            $(this).addClass('active');
            var open_id = $(this).attr('data-opentab');
            $('.taber').removeClass('active');
            $('.taber#' + open_id).addClass('active');
        });
    </script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header card-header-tabs-line">
                    <ul class="nav nav-dark nav-bold nav-tabs nav-tabs-line" data-remember-tab="tab_id" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#kt_builder_themes">General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_builder_page">Setting</a>
                        </li>
                    </ul>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form enctype="multipart/form-data" action="{{route('admin.get-payments.update',1)}}" method="post">
                @csrf
                @method('put')
                @csrf
                <!--begin::Body-->
                    <div class="card-body">
                        <div class="tab-content pt-3">
                            <!--begin::Tab Pane-->
                            <div class="tab-pane active" id="kt_builder_themes">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">Title</label>
                                    <div class="col-9">
                                        <input value="{{$payment->title}}" name="title" class="form-control" type="text"
                                               id="example-text-input">
                                        <span class="text-danger">@error('title'){{ $message }}@enderror</span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3 col-form-label">Description</label>
                                    <div class="col-9">
                                    <textarea rows="8" name="description" class="form-control" type="text"
                                              id="example-text-input">
                                        {{$payment->description}}
                                    </textarea>
                                        <span class="text-danger">@error('description'){{ $message }}@enderror</span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3 col-form-label">Days Count</label>
                                    <div class="col-9">
                                        <input value="{{$payment->days_count}}" name="days_count" class="form-control"
                                               type="number" id="example-text-input">
                                        <span class="text-danger">@error('days_count'){{ $message }}@enderror</span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3 col-form-label">Price</label>
                                    <div class="col-9">
                                        <input value="{{$payment->price}}" name="price" class="form-control" type="text"
                                               id="example-text-input">
                                        <span class="text-danger">@error('price'){{ $message }}@enderror</span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3 col-form-label">Support By</label>
                                    <div class="col-9">
                                        <input value="{{$payment->support_by}}" name="support_by" class="form-control" type="text"
                                               id="example-text-input">
                                        <span class="text-danger">@error('support_by'){{ $message }}@enderror</span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3 col-form-label">Agreement</label>
                                    <div class="col-9">
                                        <input value="{{$payment->text}}" name="text" class="form-control" type="text"
                                               id="example-text-input">
                                        <span class="text-danger">@error('text'){{ $message }}@enderror</span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-3 col-form-label">Image</label>
                                    <div class="form-group col-9">
                                        <div class="custom-file">
                                            <input name="image" type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                            <img class="mt-3" width="200px" src="{{$payment->image}}" alt="">
                                            <span class="text-danger">@error('image'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Tab Pane-->
                            <!--begin::Tab Pane-->
                            <div class="tab-pane" id="kt_builder_page">
                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <span>
                                        Get your keys from here:
                                        <a target="_blank" href="https://developer.paypal.com/developer/applications">
                                            Paypal Developer
                                        </a>
                                    </span>

                                </div>
                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Mode
                                    </div>

                                    <div class="col-12 col-lg-9 px-2">
                                        <select class="form-control" name="mode" id="">
                                            <option {{$payment->mode == 'sandbox' ? 'selected' : ''}} value="sandbox">Sandbox</option>
                                            <option {{$payment->mode == 'live' ? 'selected' : ''}} value="live">Live</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Username
                                    </div>

                                    <div class="col-12 col-lg-9 px-2">
                                        <input name="username" class="form-control" type="text"
                                               value="{{$payment->username}}"
                                               id="example-color-input">
                                    </div>
                                </div>

                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Password
                                    </div>

                                    <div class="col-12 col-lg-9 px-2">
                                        <input name="password" class="form-control" type="text"
                                               value="{{$payment->password}}"
                                               id="example-color-input">
                                    </div>
                                </div>

                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Secret
                                    </div>

                                    <div class="col-12 col-lg-9 px-2">
                                        <input name="secret" class="form-control" type="text"
                                               value="{{$payment->secret}}"
                                               id="example-color-input">
                                    </div>
                                </div>
                            </div>
                            <!--end::Tab Pane-->

                        </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-9">
                                <input type="hidden" id="tab_id" name="builder[tab][tab_id]">
                                <input type="hidden" id="tab_extra_id" name="builder[tab][tab_extra_id]">
                                <button type="submit" name="builder_submit" data-demo="demo1"
                                        class="btn btn-primary font-weight-bold mr-2 px-5">Submit
                                </button>
                                <a href="{{route('admin.home')}}" data-demo="demo1"
                                   class="button btn btn-clean font-weight-bold">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <!--end::Footer-->
                </form>
                <!--end::Form-->

            </div>
        </div>
    </div>
@endsection