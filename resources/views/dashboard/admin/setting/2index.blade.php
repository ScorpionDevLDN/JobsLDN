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
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12 px-0 py-2">
                    <style type="text/css">
                        .settings-tab-opener {
                            box-shadow: 0px 6px 12px #ebebeb;
                            border-radius: 11px;
                            cursor: pointer;
                            width: 80px;
                            height: 45px;
                        }

                        .settings-tab-opener.active {
                            box-shadow: 0px 6px 12px #c8e0ff !important;
                            color: #fff;
                            background: #2196f3;
                        }

                        .taber:not(.active) {
                            display: none;
                        }

                    </style>
                    <div class="col-12 py-0 px-3 row">

                        <div class="col-12  p-10" style="background: #fff;min-height: 80vh">

                            <div class="col-12 px-3 py-4">
                                <h4 class="font-4">Setting</h4>
                            </div>

                            <div class="col-12 row">
                                <div class="button d-flex justify-content-center align-items-center px-3 m-2 settings-tab-opener active"
                                     data-opentab="general-tab" style="width: 120px">
                                    <span class="fas fa-wrench mr-2"></span> General
                                </div>
                                <div class="d-flex justify-content-center align-items-center px-3 m-2 settings-tab-opener"
                                     data-opentab="appearance-tab" style="width: 120px">
                                    <span class="fas fa-paint-roller mr-2"></span> Appearance
                                </div>
                                <div class="d-flex justify-content-center align-items-center px-3 m-2 settings-tab-opener"
                                     data-opentab="links-tab" style="width: 120px">
                                    <span class="fas fa-code mr-2"></span> Links
                                </div>
                            </div>

                            <form enctype="multipart/form-data" action="{{route('admin.settings.update',$setting->id)}}"
                                  method="post">
                                @method('put')
                                @csrf
                                <div class="col-12 col-lg-8 px-3 py-5">

                                    <div class="col-12 row p-0 taber active" id="general-tab">
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
                                    <div class="col-12 row p-0 taber" id="appearance-tab">
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
                                                Main Color
                                            </div>
                                            <div class="col-12 col-lg-9 px-2">
                                                <input type="color" name="main_color" value="{{$setting->main_color}}"
                                                       maxlength="200">
                                            </div>
                                        </div>
                                        <div class="col-12 px-10 d-flex mb-3 row pb-3">
                                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                                secondary Color
                                            </div>
                                            <div class="col-12 col-lg-9 px-2">
                                                <input type="color" name="secondary_color"
                                                       value="{{$setting->secondary_color}}" maxlength="200">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 row p-10 taber" id="links-tab">
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
                                    <div class="col-12 row p-0 taber" id="pages-tab">

                                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                                تواصل معنا
                                            </div>
                                            <div class="col-12 col-lg-9 px-2">
                                                <textarea name="contact_page"
                                                          class="form-control editor with-file-explorer" id="mce_0"
                                                          aria-hidden="true" style="display: none;"></textarea>
                                                <div role="application" dir="rtl" class="tox tox-tinymce"
                                                     aria-disabled="false" style="visibility: hidden; height: 400px;">
                                                    <div class="tox-editor-container">
                                                        <div data-alloy-vertical-dir="toptobottom"
                                                             class="tox-editor-header">
                                                            <div role="menubar" data-alloy-tabstop="true"
                                                                 class="tox-menubar">
                                                                <button aria-haspopup="true" role="menuitem"
                                                                        type="button" tabindex="-1"
                                                                        data-alloy-tabstop="true" unselectable="on"
                                                                        class="tox-mbtn tox-mbtn--select"
                                                                        aria-expanded="false"
                                                                        style="user-select: none;"><span
                                                                            class="tox-mbtn__select-label">ملف</span>
                                                                    <div class="tox-mbtn__select-chevron">
                                                                        <svg width="10" height="10" focusable="false">
                                                                            <path d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                                                                  fill-rule="nonzero"></path>
                                                                        </svg>
                                                                    </div>
                                                                </button>
                                                                <button aria-haspopup="true" role="menuitem"
                                                                        type="button" tabindex="-1"
                                                                        data-alloy-tabstop="true" unselectable="on"
                                                                        class="tox-mbtn tox-mbtn--select"
                                                                        aria-expanded="false"
                                                                        style="user-select: none;"><span
                                                                            class="tox-mbtn__select-label">تحرير</span>
                                                                    <div class="tox-mbtn__select-chevron">
                                                                        <svg width="10" height="10" focusable="false">
                                                                            <path d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                                                                  fill-rule="nonzero"></path>
                                                                        </svg>
                                                                    </div>
                                                                </button>
                                                                <button aria-haspopup="true" role="menuitem"
                                                                        type="button" tabindex="-1"
                                                                        data-alloy-tabstop="true" unselectable="on"
                                                                        class="tox-mbtn tox-mbtn--select"
                                                                        aria-expanded="false"
                                                                        style="user-select: none;"><span
                                                                            class="tox-mbtn__select-label">عرض</span>
                                                                    <div class="tox-mbtn__select-chevron">
                                                                        <svg width="10" height="10" focusable="false">
                                                                            <path d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                                                                  fill-rule="nonzero"></path>
                                                                        </svg>
                                                                    </div>
                                                                </button>
                                                                <button aria-haspopup="true" role="menuitem"
                                                                        type="button" tabindex="-1"
                                                                        data-alloy-tabstop="true" unselectable="on"
                                                                        class="tox-mbtn tox-mbtn--select"
                                                                        aria-expanded="false"
                                                                        style="user-select: none;"><span
                                                                            class="tox-mbtn__select-label">إدراج</span>
                                                                    <div class="tox-mbtn__select-chevron">
                                                                        <svg width="10" height="10" focusable="false">
                                                                            <path d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                                                                  fill-rule="nonzero"></path>
                                                                        </svg>
                                                                    </div>
                                                                </button>
                                                                <button aria-haspopup="true" role="menuitem"
                                                                        type="button" tabindex="-1"
                                                                        data-alloy-tabstop="true" unselectable="on"
                                                                        class="tox-mbtn tox-mbtn--select"
                                                                        aria-expanded="false"
                                                                        style="user-select: none;"><span
                                                                            class="tox-mbtn__select-label">تنسيق</span>
                                                                    <div class="tox-mbtn__select-chevron">
                                                                        <svg width="10" height="10" focusable="false">
                                                                            <path d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                                                                  fill-rule="nonzero"></path>
                                                                        </svg>
                                                                    </div>
                                                                </button>
                                                                <button aria-haspopup="true" role="menuitem"
                                                                        type="button" tabindex="-1"
                                                                        data-alloy-tabstop="true" unselectable="on"
                                                                        class="tox-mbtn tox-mbtn--select"
                                                                        aria-expanded="false"
                                                                        style="user-select: none;"><span
                                                                            class="tox-mbtn__select-label">الأدوات</span>
                                                                    <div class="tox-mbtn__select-chevron">
                                                                        <svg width="10" height="10" focusable="false">
                                                                            <path d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                                                                  fill-rule="nonzero"></path>
                                                                        </svg>
                                                                    </div>
                                                                </button>
                                                                <button aria-haspopup="true" role="menuitem"
                                                                        type="button" tabindex="-1"
                                                                        data-alloy-tabstop="true" unselectable="on"
                                                                        class="tox-mbtn tox-mbtn--select"
                                                                        aria-expanded="false"
                                                                        style="user-select: none;"><span
                                                                            class="tox-mbtn__select-label">جدول</span>
                                                                    <div class="tox-mbtn__select-chevron">
                                                                        <svg width="10" height="10" focusable="false">
                                                                            <path d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                                                                  fill-rule="nonzero"></path>
                                                                        </svg>
                                                                    </div>
                                                                </button>
                                                            </div>
                                                            <div role="group" class="tox-toolbar-overlord"
                                                                 aria-disabled="false">
                                                                <div role="group" class="tox-toolbar__primary">
                                                                    <div title="المحفوظات" role="toolbar"
                                                                         data-alloy-tabstop="true" tabindex="-1"
                                                                         class="tox-toolbar__group">
                                                                        <button aria-label="تراجع" title="تراجع"
                                                                                type="button" tabindex="-1"
                                                                                class="tox-tbtn tox-tbtn--disabled"
                                                                                aria-disabled="true"><span
                                                                                    class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                                        width="24" height="24"
                                                                                        focusable="false"><path
                                                                                            d="M6.4 8H12c3.7 0 6.2 2 6.8 5.1.6 2.7-.4 5.6-2.3 6.8a1 1 0 01-1-1.8c1.1-.6 1.8-2.7 1.4-4.6-.5-2.1-2.1-3.5-4.9-3.5H6.4l3.3 3.3a1 1 0 11-1.4 1.4l-5-5a1 1 0 010-1.4l5-5a1 1 0 011.4 1.4L6.4 8z"
                                                                                            fill-rule="nonzero"></path></svg></span>
                                                                        </button>
                                                                        <button aria-label="إعادة" title="إعادة"
                                                                                type="button" tabindex="-1"
                                                                                class="tox-tbtn tox-tbtn--disabled"
                                                                                aria-disabled="true"><span
                                                                                    class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                                        width="24" height="24"
                                                                                        focusable="false"><path
                                                                                            d="M17.6 10H12c-2.8 0-4.4 1.4-4.9 3.5-.4 2 .3 4 1.4 4.6a1 1 0 11-1 1.8c-2-1.2-2.9-4.1-2.3-6.8.6-3 3-5.1 6.8-5.1h5.6l-3.3-3.3a1 1 0 111.4-1.4l5 5a1 1 0 010 1.4l-5 5a1 1 0 01-1.4-1.4l3.3-3.3z"
                                                                                            fill-rule="nonzero"></path></svg></span>
                                                                        </button>
                                                                    </div>
                                                                    <div title="الأنماط" role="toolbar"
                                                                         data-alloy-tabstop="true" tabindex="-1"
                                                                         class="tox-toolbar__group">
                                                                        <button title="التنسيقات" aria-label="التنسيقات"
                                                                                aria-haspopup="true" type="button"
                                                                                tabindex="-1" unselectable="on"
                                                                                class="tox-tbtn tox-tbtn--select tox-tbtn--bespoke"
                                                                                aria-expanded="false"
                                                                                style="user-select: none;"><span
                                                                                    class="tox-tbtn__select-label">الفقرة</span>
                                                                            <div class="tox-tbtn__select-chevron">
                                                                                <svg width="10" height="10"
                                                                                     focusable="false">
                                                                                    <path d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                                                                          fill-rule="nonzero"></path>
                                                                                </svg>
                                                                            </div>
                                                                        </button>
                                                                    </div>
                                                                    <div title="تنسيق" role="toolbar"
                                                                         data-alloy-tabstop="true" tabindex="-1"
                                                                         class="tox-toolbar__group">
                                                                        <button aria-label="غامق" title="غامق"
                                                                                type="button" tabindex="-1"
                                                                                class="tox-tbtn" aria-disabled="false"
                                                                                aria-pressed="false"><span
                                                                                    class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                                        width="24" height="24"
                                                                                        focusable="false"><path
                                                                                            d="M7.8 19c-.3 0-.5 0-.6-.2l-.2-.5V5.7c0-.2 0-.4.2-.5l.6-.2h5c1.5 0 2.7.3 3.5 1 .7.6 1.1 1.4 1.1 2.5a3 3 0 01-.6 1.9c-.4.6-1 1-1.6 1.2.4.1.9.3 1.3.6s.8.7 1 1.2c.4.4.5 1 .5 1.6 0 1.3-.4 2.3-1.3 3-.8.7-2.1 1-3.8 1H7.8zm5-8.3c.6 0 1.2-.1 1.6-.5.4-.3.6-.7.6-1.3 0-1.1-.8-1.7-2.3-1.7H9.3v3.5h3.4zm.5 6c.7 0 1.3-.1 1.7-.4.4-.4.6-.9.6-1.5s-.2-1-.7-1.4c-.4-.3-1-.4-2-.4H9.4v3.8h4z"
                                                                                            fill-rule="evenodd"></path></svg></span>
                                                                        </button>
                                                                        <button aria-label="مائل" title="مائل"
                                                                                type="button" tabindex="-1"
                                                                                class="tox-tbtn" aria-disabled="false"
                                                                                aria-pressed="false"><span
                                                                                    class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                                        width="24" height="24"
                                                                                        focusable="false"><path
                                                                                            d="M16.7 4.7l-.1.9h-.3c-.6 0-1 0-1.4.3-.3.3-.4.6-.5 1.1l-2.1 9.8v.6c0 .5.4.8 1.4.8h.2l-.2.8H8l.2-.8h.2c1.1 0 1.8-.5 2-1.5l2-9.8.1-.5c0-.6-.4-.8-1.4-.8h-.3l.2-.9h5.8z"
                                                                                            fill-rule="evenodd"></path></svg></span>
                                                                        </button>
                                                                    </div>
                                                                    <div role="toolbar" data-alloy-tabstop="true"
                                                                         tabindex="-1" class="tox-toolbar__group">
                                                                        <button aria-label="المزيد..." title="المزيد..."
                                                                                aria-haspopup="true" type="button"
                                                                                tabindex="-1" data-alloy-tabstop="true"
                                                                                class="tox-tbtn" aria-expanded="false">
                                                                            <span class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                                        width="24" height="24"
                                                                                        focusable="false"><path
                                                                                            d="M6 10a2 2 0 00-2 2c0 1.1.9 2 2 2a2 2 0 002-2 2 2 0 00-2-2zm12 0a2 2 0 00-2 2c0 1.1.9 2 2 2a2 2 0 002-2 2 2 0 00-2-2zm-6 0a2 2 0 00-2 2c0 1.1.9 2 2 2a2 2 0 002-2 2 2 0 00-2-2z"
                                                                                            fill-rule="nonzero"></path></svg></span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tox-anchorbar"></div>
                                                        </div>
                                                        <div class="tox-sidebar-wrap">
                                                            <div class="tox-edit-area">
                                                                <iframe id="mce_0_ifr" frameborder="0"
                                                                        allowtransparency="true" title=""
                                                                        class="tox-edit-area__iframe"
                                                                        srcdoc="<!DOCTYPE html><html><head><meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=UTF-8&quot; /></head><body id=&quot;tinymce&quot; class=&quot;mce-content-body &quot; data-id=&quot;mce_0&quot; aria-label=&quot;منطقة نص منسق. اضغط ALT-0 للحصول على المساعدة.&quot;><br></body></html>"></iframe>
                                                            </div>
                                                            <div role="complementary" class="tox-sidebar">
                                                                <div data-alloy-tabstop="true" tabindex="-1"
                                                                     class="tox-sidebar__slider tox-sidebar--sliding-closed"
                                                                     style="width: 0px;">
                                                                    <div class="tox-sidebar__pane-container"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tox-statusbar">
                                                        <div class="tox-statusbar__text-container">
                                                            <div role="navigation" data-alloy-tabstop="true"
                                                                 class="tox-statusbar__path" aria-disabled="false">
                                                                <div data-index="0" aria-level="1" role="button"
                                                                     tabindex="-1" class="tox-statusbar__path-item"
                                                                     aria-disabled="false">p
                                                                </div>
                                                            </div>
                                                            <button type="button" tabindex="-1"
                                                                    data-alloy-tabstop="true"
                                                                    class="tox-statusbar__wordcount">0 من الكلمات
                                                            </button>
                                                            <span class="tox-statusbar__branding"><a
                                                                        href="https://www.tiny.cloud/powered-by-tiny?utm_campaign=editor_referral&amp;utm_medium=poweredby&amp;utm_source=tinymce&amp;utm_content=v6"
                                                                        rel="noopener" target="_blank"
                                                                        aria-label="مدعوم بواسطة Tiny" tabindex="-1"><svg
                                                                            width="50px" height="16px"
                                                                            viewBox="0 0 50 16"
                                                                            xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" clip-rule="evenodd"
        d="M10.143 0c2.608.015 5.186 2.178 5.186 5.331 0 0 .077 3.812-.084 4.87-.361 2.41-2.164 4.074-4.65 4.496-1.453.284-2.523.49-3.212.623-.373.071-.634.122-.785.152-.184.038-.997.145-1.35.145-2.732 0-5.21-2.04-5.248-5.33 0 0 0-3.514.03-4.442.093-2.4 1.758-4.342 4.926-4.963 0 0 3.875-.752 4.036-.782.368-.07.775-.1 1.15-.1Zm1.826 2.8L5.83 3.989v2.393l-2.455.475v5.968l6.137-1.189V9.243l2.456-.476V2.8ZM5.83 6.382l3.682-.713v3.574l-3.682.713V6.382Zm27.173-1.64-.084-1.066h-2.226v9.132h2.456V7.743c-.008-1.151.998-2.064 2.149-2.072 1.15-.008 1.987.92 1.995 2.072v5.065h2.455V7.359c-.015-2.18-1.657-3.929-3.837-3.913a3.993 3.993 0 0 0-2.908 1.296Zm-6.3-4.266L29.16 0v2.387l-2.456.475V.476Zm0 3.2v9.132h2.456V3.676h-2.456Zm18.179 11.787L49.11 3.676H46.58l-1.612 4.527-.46 1.382-.384-1.382-1.611-4.527H39.98l3.3 9.132L42.15 16l2.732-.537ZM22.867 9.738c0 .752.568 1.075.921 1.075.353 0 .668-.047.998-.154l.537 1.765c-.23.154-.92.537-2.225.537-1.305 0-2.655-.997-2.686-2.686a136.877 136.877 0 0 1 0-4.374H18.8V3.676h1.612v-1.98l2.455-.476v2.456h2.302V5.9h-2.302v3.837Z"></path>
</svg></a></span></div>
                                                        <div title="تغيير الحجم" data-alloy-tabstop="true" tabindex="-1"
                                                             class="tox-statusbar__resize-handle">
                                                            <svg width="10" height="10" focusable="false">
                                                                <g fill-rule="nonzero">
                                                                    <path d="M8.1 1.1A.5.5 0 119 2l-7 7A.5.5 0 111 8l7-7zM8.1 5.1A.5.5 0 119 6l-3 3A.5.5 0 115 8l3-3z"></path>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <div aria-hidden="true" class="tox-throbber"
                                                         style="display: none;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                                            <br>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="col-12 row p-0 taber" id="codes-tab">
                                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                                كود الهيدر
                                            </div>
                                            <div class="col-12 col-lg-9 px-2">
                                                <textarea name="header_code" class="form-control"
                                                          style="min-height: 200px;text-align: left;direction: ltr;"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                                كود الفوتر
                                            </div>
                                            <div class="col-12 col-lg-9 px-2">
                                                <textarea name="footer_code" class="form-control"
                                                          style="min-height: 200px;text-align: left;direction: ltr;"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                                ملف robots
                                            </div>
                                            <div class="col-12 col-lg-9 px-2">
                                                <textarea name="robots_txt" class="form-control"
                                                          style="min-height: 200px;text-align: left;direction: ltr;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 row p-0 taber" id="others-tab">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary pb-2 px-15">Save
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection