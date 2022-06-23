@extends('AdminDashboard.index')
@section('breadcrumb')
    <a href="{{route('admin.settings.index')}}" class="btn">Settings</a>
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
                            <a class="nav-link" data-toggle="tab" href="#kt_builder_page">Appearance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_builder_header">Links</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_builder_recaptcha">Re-captcha</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_builder_email">Emails from</a>
                        </li>
                    </ul>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form enctype="multipart/form-data" action="{{route('admin.settings.update',$setting->id)}}"
                      method="post">
                @method('put')
                @csrf
                <!--begin::Body-->
                    <div class="card-body">
                        <div class="tab-content pt-3">
                            <!--begin::Tab Pane-->
                            <div class="tab-pane active" id="kt_builder_themes">
                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Website Name
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                        <input type="text" name="website_name" class="form-control"
                                               value="{{$setting->website_name}}">
                                    </div>
                                </div>
                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Address
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                                <textarea name="address"
                                                          class="form-control">{{$setting->address}}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Website bio
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                                <textarea name="bio"
                                                          class="form-control">{{$setting->bio}}</textarea>
                                    </div>
                                </div>

                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Contact Email
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                        <input type="email" name="contact_email" class="form-control"
                                               value="{{$setting->contact_email}}">
                                    </div>
                                </div>


                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Slogan Text
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                        <input type="text" name="slogan_text" class="form-control"
                                               value="{{$setting->slogan_text}}">
                                    </div>
                                </div>

                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        copy Right Text
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                        <input type="text" name="copy_right_text" class="form-control"
                                               value="{{$setting->copy_right_text}}">
                                    </div>
                                </div>
                            </div>
                            <!--end::Tab Pane-->
                            <!--begin::Tab Pane-->
                            <div class="tab-pane" id="kt_builder_page">
                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Website Cover
                                    </div>


                                    <div class="col-12 col-lg-9 px-2">
                                        <div class="custom-file">
                                            <input name="cover" type="file" class="custom-file-input"
                                                   id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose
                                                file</label>
                                        </div>
                                        <div class="col-12 p-2">
                                            <img src="{{$setting->cover}}"
                                                 style="width:100px;max-height: 100px;">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Website Logo
                                    </div>


                                    <div class="col-12 col-lg-9 px-2">
                                        <div class="custom-file">
                                            <input name="logo" type="file" class="custom-file-input"
                                                   id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose
                                                file</label>
                                        </div>
                                        <div class="col-12 p-2">
                                            <img src="{{$setting->logo}}"
                                                 style="width:100px;max-height: 100px;">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Secondary Color
                                    </div>

                                    <div class="col-12 col-lg-9 px-2">
                                        <input name="main_color" class="form-control" type="color"
                                               value="{{$setting->main_color}}"
                                               id="example-color-input">
                                    </div>
                                </div>

                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Secondary Color
                                    </div>

                                    <div class="col-12 col-lg-9 px-2">
                                        <input name="secondary_color" class="form-control" type="color"
                                               value="{{$setting->secondary_color}}"
                                               id="example-color-input">
                                    </div>
                                </div>
                            </div>
                            <!--end::Tab Pane-->
                            <!--begin::Tab Pane-->
                            <div class="tab-pane" id="kt_builder_header">
                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        phone
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                        <input type="text" name="phone" class="form-control"
                                               value="{{$setting->phone}}"
                                               maxlength="190">
                                    </div>
                                </div>
                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        phone2
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                        <input type="text" name="phone2" class="form-control"
                                               value="{{$setting->phone2}}"
                                               maxlength="190">
                                    </div>
                                </div>
                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Whatsapp Link
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                        <input type="text" name="whatsapp_phone" class="form-control"
                                               value="{{$setting->whatsapp_phone}}">
                                    </div>
                                </div>
                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Facebook Link
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                        <input type="text" name="facebook_link" class="form-control"
                                               value="{{$setting->facebook_link}}">
                                    </div>
                                </div>
                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Twitter URL
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                        <input type="text" name="twitter_link" class="form-control"
                                               value="{{$setting->twitter_link}}">
                                    </div>
                                </div>
                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Instagram Link
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                        <input type="text" name="instagram_link" class="form-control"
                                               value="{{$setting->instagram_link}}">
                                    </div>
                                </div>
                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Youtube Link
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                        <input type="text" name="youtube_link" class="form-control"
                                               value="{{$setting->youtube_link}}">
                                    </div>
                                </div>
                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Telegram Link
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                        <input type="text" name="telegram_link" class="form-control"
                                               value="{{$setting->telegram_link}}">
                                    </div>
                                </div>
                            </div>
                            <!--end::Tab Pane-->

                            <!--begin::Tab Pane-->
                            <div class="tab-pane" id="kt_builder_recaptcha">
                                {{--capatcha--}}
                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <h6>
                                        Get your key from here:
                                        <a target="_blank" href="https://www.google.com/recaptcha/admin/create">Google
                                            reCAPTCHA </a></h6>

                                </div>

                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Recaptcha Site Key
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                        <input type="text" name="site_key" class="form-control"
                                               value="{{$setting->site_key}}">
                                    </div>
                                </div>

                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Recaptcha Secret Key
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                        <input type="text" name="secret_key" class="form-control"
                                               value="{{$setting->secret_key}}">
                                    </div>
                                </div>
                                <br>
                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <h6 class="text-muted"> Before you logout, please open anew browser and make sure
                                        your reCaptcha is working </h6>
                                </div>
                            </div>
                            <!--end::Tab Pane-->

                            <!--begin::Tab Pane-->
                            <div class="tab-pane" id="kt_builder_email">
                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Emails from
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                        <input type="text" name="email_from" class="form-control"
                                               value="test@demo2.admin.com">
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