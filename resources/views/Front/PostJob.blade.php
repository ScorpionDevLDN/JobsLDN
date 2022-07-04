@extends('FrontLayout.index')
@section('content')
    <!-- Page banner-->
    <section class="page-banner py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-2 order-md-1">
                    <h2 class="page-banner__title">Edit job for
                        free now!</h2>
                </div>
                <div class="col-md-6 order-1 order-md-2">
                    <div class="page-banner__image"><img src="{{asset('assets/images/contact/header.svg')}}"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- page-banner-end-->

    <!-- Contact form-->
    <section class="py-5">
        <div class="container">
            <form enctype="multipart/form-data" action="{{route('editJobUpdate',$post->id)}}" method="post">
                @csrf
                <div class="row">
                    @if(session()->has('message'))
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissible">
                                {{ session()->get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <p class="font-weight-bold">Summary
                            Write about the desired job, it is
                            recommended that this be brief</p>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group mb-4">
                            {{--                            <label>Large Input</label>--}}
                            <input name="title" type="text" class="form-control form-control-lg"
                                   placeholder="Title">
                            @if($errors->has('title'))
                                <small><span class="text-danger">{{ $errors->first('title') }}</span></small>
                            @endif
                        </div>
                        <div class="from-group mb-4">
                            <textarea name="summery" class="form-control form-control-lg" rows="3"></textarea>
                            @if($errors->has('summery'))
                                <small><span class="text-danger">{{ $errors->first('summery') }}</span></small>
                            @endif
                        </div>

                        <div class="from-group mb-4">
                            <div class="file-input">
                                <input type="file" name="pdf_details" id="file-input" class="file-input__input"/>
                                <label class="file-input__label" for="file-input">
                                    <span class="mr-2">Upload attachment</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17.5" height="21.5"
                                         viewBox="0 0 17.5 21.5">
                                        <g id="ic-actions-add-file" transform="translate(0.75 0.75)">
                                            <line id="Line_1" data-name="Line 1" x1="8" transform="translate(4 11.13)"
                                                  fill="none" stroke="#56bb37" stroke-linecap="round"
                                                  stroke-linejoin="bevel"
                                                  stroke-width="1.5"/>
                                            <line id="Line_2" data-name="Line 2" y1="8" transform="translate(8 7.13)"
                                                  fill="none" stroke="#56bb37" stroke-linecap="round"
                                                  stroke-linejoin="bevel"
                                                  stroke-width="1.5"/>
                                            <path id="Path_1" data-name="Path 1"
                                                  d="M14.86,2H6A2,2,0,0,0,4,4V20a2,2,0,0,0,2,2H18a2,2,0,0,0,2-2V8.92a.94.94,0,0,0-.18-.57L15.67,2.43A1,1,0,0,0,14.86,2Z"
                                                  transform="translate(-4 -2)" fill="none" stroke="#56bb37"
                                                  stroke-linecap="round" stroke-linejoin="bevel" stroke-width="1.5"
                                                  fill-rule="evenodd"/>
                                        </g>
                                    </svg>
                                </label>
                            </div>
                            @if($errors->has('pdf_details'))
                                <div class="row">
                                    <div class="col-4 ml-3">
                                        <small class="text-muted" style="font-size: 65%">
                                            {{ $errors->first('pdf_details') }}
                                        </small>
                                    </div>
                                </div>
                            @endif

                        </div>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <p class="font-weight-bold">Summary
                            Write about the desired job, it is
                            recommended that this be brief</p>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6 py-3">
                                <input name="category_id" class="form-control form-control-lg" type="text"
                                       placeholder="category_id" value=""
                                       required>
                            </div>

                            <div class="col-md-6 py-3">
                                <input name="city_id" class="form-control form-control-lg" type="text"
                                       placeholder="city_id" value=""
                                       required>
                            </div>

                            <div class="col-md-6 py-3">
                                <input name="type_id" class="form-control form-control-lg" type="text"
                                       placeholder="type_id" value=""
                                       required>
                            </div>

                            <div class="col-md-6 py-3">
                                <input name="salary" class="form-control form-control-lg" type="text"
                                       placeholder="salary" value=""
                                       required>
                            </div>

                            <div class="col-md-6 py-3">
                                <input name="currency_id" class="form-control form-control-lg" type="text"
                                       placeholder="currency_id" value=""
                                       required>
                            </div>

                            <div class="col-md-6 py-3">
                                <input name="per_id" class="form-control form-control-lg" type="text"
                                       placeholder="per_id" value=""
                                       required>
                            </div>

                            <div class="col-md-6 py-3">
                                <input name="expired_at" class="form-control form-control-lg" type="date"
                                       placeholder="expired_at" value=""
                                       required>
                            </div>

                            <div class="col-md-6 py-3">
                                <input name="job_post_email" class="form-control form-control-lg" type="text"
                                       placeholder="job_post_email" value=""
                                       required>
                            </div>

                            <div class="col-md-12 py-3">
                                <section class="page-banner py-5">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h2 class="page-banner__title">Aya</h2>
                                                <h6>
                                                    There is no need to keep your post lost among thousands
                                                    of job posts. Now you can publish this ad to have priority on
                                                    these pages for 5 days for £16.99 only - Excluding VAT.

                                                </h6>
                                                <input name="is_super_post" type="checkbox">
                                                <label for="">
                                                    Make this post as Super Post.
                                                </label>
                                            </div>
                                            <div class="col-md-6 order-md-2">
                                                <div class="page-banner__image"><img src="{{asset('assets/images/bookmark/super_post.svg')}}"></div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary px-5" type="submit">post</button>
                            </div>
                            <div class="col-md-1">
                                <a class="btn btn-light px-5">cancel</a>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- contact-form-end-->
@endsection