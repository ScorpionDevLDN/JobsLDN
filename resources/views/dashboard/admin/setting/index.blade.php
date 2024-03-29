@extends('AdminDashboard.index')
@section('breadcrumb')
    <a href="{{route('admin.settings.index')}}" class="btn">Settings</a>
@endsection
@section('title' ,'Settings')
@section('js')
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script type="text/javascript">
        $('.settings-tab-opener').on('click', function () {
            $('.settings-tab-opener').removeClass('active');
            $(this).addClass('active');
            var open_id = $(this).attr('data-opentab');
            $('.taber').removeClass('active');
            $('.taber#' + open_id).addClass('active');
        });
        var getFontawsomeIcons = [
            // {text : "{{trans('app.select_icon')}}" , id : 0 },
                @foreach(getFontawsomeIcons() as $item)
            {
                id: '{{$item}}',
                text: '{{$item}}',
                html: '<i class="{{$item}} fa-2x"></i>',
            },
            @endforeach
        ];
        $("#single").select2({
            placeholder: "Select a logo",
            allowClear: true,
            data: getFontawsomeIcons,
            templateResult: function (d) {
                return $(d.html);
            },
            templateSelection: function (d) {
                return $(d.html);
            },
        });
        $(".enable_s3").click(function(){
            $("#storage").toggle();
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
                            <a class="nav-link" data-toggle="tab" href="#kt_builder_storage">Storage</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_builder_recaptcha">Re-captcha</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_builder_mailchimp">Mail-Chimp</a>
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

                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Terms And Condition
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                                <textarea id="content" rows='8' name="terms" placeholder="description"
                                                          class="form-control summernote">
                                                    {{$setting->terms}}
                                                </textarea>
                                    </div>
                                </div>

                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Privacy
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                                <textarea id="content" rows='8' name="privacy" placeholder="description"
                                                          class="form-control summernote">
{{$setting->privacy}}
                                                </textarea>
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
                                        Icon Logo
                                    </div>


                                    <div class="col-12 col-lg-9 px-2">
                                        <div class="custom-file">
                                            <input name="icon_logo" type="file" class="custom-file-input"
                                                   id="customFile1">
                                            <label class="custom-file-label" for="customFile1">Choose
                                                file</label>
                                        </div>
                                        <div class="col-12 p-2">
                                            <img src="{{isset($setting->icon_logo) ? asset('storage/'.$setting->icon_logo) : asset('admin/images/dashboard-logo.png')}}"
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
                                        Instagram URL
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                        <input type="text" name="instagram_link" class="form-control"
                                               value="{{$setting->instagram_link}}">
                                    </div>
                                </div>
                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Youtube URL
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                        <input type="text" name="youtube_link" class="form-control"
                                               value="{{$setting->youtube_link}}">
                                    </div>
                                </div>
                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Linkedin URL
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                        <input type="text" name="linkedin_link" class="form-control"
                                               value="{{$setting->linkedin_link}}">
                                    </div>
                                </div>
                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Telegram URL
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                        <input type="text" name="telegram_link" class="form-control"
                                               value="{{$setting->telegram_link}}">
                                    </div>
                                </div>
                            </div>
                            <!--end::Tab Pane-->

                            <!--begin::Tab Pane-->
                            <div class="tab-pane" id="kt_builder_mailchimp">
                                {{--capatcha--}}
                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <h6>
                                        Get your key from here:
                                        <a target="_blank"
                                           href="https://us8.admin.mailchimp.com/?referrer=%2Flists%2Fmembers%2F">Mailchimp</a>
                                    </h6>

                                </div>

                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        MAILCHIMP_LIST_ID
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                        <input type="text" name="mailchimp_list_id" class="form-control"
                                               value="{{$setting->mailchimp_list_id}}">
                                    </div>
                                </div>

                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        MAILCHIMP_APIKEY
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                        <input type="text" name="mailchimp_api_key" class="form-control"
                                               value="{{$setting->mailchimp_api_key}}">
                                    </div>
                                </div>
                            </div>
                            <!--end::Tab Pane-->

                            <!--begin::Tab Pane-->
                            <div class="tab-pane" id="kt_builder_storage">
                                {{--capatcha--}}
                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <h6 class="text-dark"> Note: Be careful when you enable S3, your files storage for
                                        attachments will be stored directly in your AWS S3 service. If you like it to be
                                        directly in your local hosting make it disable. </h6>
                                </div>


                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <h6>
                                        Click this link to see how to enable S3 service
                                        <a target="_blank" href="{{route('s3')}}"> AWS
                                            S3 </a></h6>
                                </div>

                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="form-group">
                                        <label class=" col-form-label">Enable S3</label>
                                        <div class="">
											<span class="switch  switch-icon">
												<label>
													<input id="enable_s3" class="enable_s3" type="checkbox"
                                                           name="enable_s3"
                                                           value="1" {{(isset($setting['enable_s3']) and $setting['enable_s3']) ? 'checked="checked"' : ''}} />
													<span></span>
												</label>
											</span>
                                        </div>
                                        @error('enable_s3')
                                        <span class="form-text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div id="storage" style="display: {{$setting['enable_s3'] == 1 ? '' : 'none'}}">
                                    <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                        <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                            Access Key ID <span class="text-danger">*</span>
                                        </div>
                                        <div class="col-12 col-lg-9 px-2">
                                            <input type="text" name="s3_key" class="form-control"
                                                   value="{{$setting->s3_key}}">
                                        </div>
                                    </div>

                                    <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                        <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                            Secret Access Key <span class="text-danger">*</span>
                                        </div>
                                        <div class="col-12 col-lg-9 px-2">
                                            <input type="text" name="s3_secret" class="form-control"
                                                   value="{{$setting->s3_secret}}">
                                        </div>
                                    </div>

                                    <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                        <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                            S3 Region <span class="text-danger">*</span>
                                        </div>
                                        <div class="col-12 col-lg-9 px-2">
                                            <input type="text" name="s3_region" class="form-control"
                                                   value="{{$setting->s3_region}}">
                                        </div>
                                    </div>

                                    <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                        <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                            S3 Bucket <span class="text-danger">*</span>
                                        </div>
                                        <div class="col-12 col-lg-9 px-2">
                                            <input type="text" name="s3_bucket" class="form-control"
                                                   value="{{$setting->s3_bucket}}">
                                        </div>
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

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label ">Email Logo</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="image-input image-input-outline" id="kt_image_2">
                                            <div class="image-input-wrapper"
                                                 style="background-image: url({{isset($setting['email_logo']) ? $setting['email_logo'] : null}})"></div>
                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                   data-action="change" data-toggle="tooltip"
                                                   title="image"
                                                   data-original-title="Change Image">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="email_logo"
                                                       accept=".png, .jpg, .jpeg"/>
                                                <input type="hidden" name="profile_avatar_remove"/>
                                            </label>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                  data-action="cancel" data-toggle="tooltip"
                                                  title="Cancel Image">
												<i class="ki ki-bold-close icon-xs text-muted"></i>
											</span>
                                        </div>
                                        <span class="form-text text-muted">accept:.png, .jpg, .jpeg</span>
                                        @error('email_logo')
                                        <span class="form-text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Email
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                        <input type="text" name="email_from" class="form-control"
                                               value="{{$setting->email_from}}">
                                    </div>

                                </div>

                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Password
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                        <input type="text" name="email_password" class="form-control"
                                               value="{{$setting->email_password}}">
                                    </div>

                                </div>
                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Host
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                        <input type="text" name="email_host" class="form-control"
                                               value="{{$setting->email_host}}">
                                    </div>

                                </div>
                                <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                    <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                        Port
                                    </div>
                                    <div class="col-12 col-lg-9 px-2">
                                        <input type="text" name="email_port" class="form-control"
                                               value="{{$setting->email_port}}">
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
