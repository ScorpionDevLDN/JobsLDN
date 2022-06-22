@extends('AdminDashboard.index')
@section('breadcrumb')
    <a href="#" class="btn">Settings</a>
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
    <br>
    <br>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <ul class="nav nav-dark nav-bold nav-tabs nav-tabs-line" data-remember-tab="tab_id" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_builder_slider">Sliders</a>
                        </li>
                    </ul>
                </div>
                <!--begin::Tab Pane-->
                <div class="card-body">
                    <div class="tab-pane" id="kt_builder_slider">
                        <table id="tableToExcel" class="table responsive" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Main text</th>
                                <th scope="col">Description</th>
                                <th scope="col">CTA</th>
                                {{--                                        <th scope="col">Image</th>--}}
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $slider)
                                <tr>
                                    <th scope="row">{{$slider->id}}</th>
                                    <td>{{$slider->text}}</td>
                                    <td>{{$slider->description}}</td>
                                    <td>{{$slider->cta}}</td>
                                    {{--                                            <td><img src="{{$slider->image}}" width="10%" alt=""></td>--}}
                                    <td>
                                        <div class="row">
                                            <div class="col-1">
                                                <a href="#" class="btn btn-light-primary font-weight-bold btn-icon"
                                                   data-toggle="modal"
                                                   data-target="#exampleModalEdit{{$slider->id}}">
                                            <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Design/Edit.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
              fill="#000000" fill-rule="nonzero"
              transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal-->
                                <div class="modal fade" id="exampleModalEdit{{$slider->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form enctype="multipart/form-data"
                                              action="{{route('admin.sliders.update',$slider->id)}}" method="post">
                                            @method('put')
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Silder</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>text
                                                            <span class="text-danger">*</span></label>
                                                        <input required value="{{$slider->text}}" type="text"
                                                               name="text"
                                                               class="form-control"
                                                               placeholder="Enter slider text"/>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Description
                                                            <span class="text-danger">*</span></label>
                                                        <input required value="{{$slider->description}}" type="text"
                                                               name="description"
                                                               class="form-control"
                                                               placeholder="Enter slider description"/>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>CTA
                                                            <span class="text-danger">*</span></label>
                                                        <input required value="{{$slider->cta}}" type="text" name="cta"
                                                               class="form-control"
                                                               placeholder="Enter slider cta"/>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label>Image
                                                            <span class="text-danger">*</span></label>
                                                        <div class="custom-file">
                                                            <input name="image" type="file" class="custom-file-input"
                                                                   id="customFile">
                                                            <label class="custom-file-label" for="customFile">Choose
                                                                file</label>
                                                            <img src="{{$slider->image}}" width="20%" alt="">
                                                            <span class="text-danger">@error('image'){{ $message }}@enderror</span>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-primary font-weight-bold"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary font-weight-bold">Save
                                                        changes
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!--end::Button-->
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
                <!--end::Tab Pane-->

            </div>
        </div>
    </div>
@endsection