@php
    $menu = 'contacts';
@endphp
@extends('frontend.app.layout')
@section('content')
    <!-- Start Page Banner Section -->
    <section class="page-banner contact" id="page-banner">
        <div class="container">
            <div class="row position-relative">
                <div class="col-12 col-lg-8">
                    <h1 class="py-5 py-lg-0 text-center text-lg-start">Get in touch!</h1>
                </div>
                <div class="col-12 col-lg-4 text-center text-lg-end">
                    <img src="{{asset('frontend/images/page-banners/contact_banner.svg')}}" alt="Person"
                         class="contact-banner">
                </div>
            </div>
        </div>
    </section>
    <!-- End Page Banner Section -->

    <!-- Start Contact Info -->
    <section class="contact-info pt-0" id="contact-info">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-start">
                <div class="col-6 col-sm-6 col-xl-3 wow animate animate__fadeInUp animation-delay-1">
                    <h3>Our Office</h3>
                    <p>{{$setting->address}}</p>
                </div>
                <div class="col-6 col-sm-6 col-xl-3 wow animate animate__fadeInUp animation-delay-2">
                    <h3>E-mail</h3>
                    <p>{{$setting->contact_email}}</p>
                </div>
                <div class="col-6 col-sm-6 col-xl-3 wow animate animate__fadeInUp animation-delay-3">
                    <h3>Phone</h3>
                    <p>{{$setting->phone}}</p>
                </div>
                <div class="col-6 col-sm-6 col-xl-3 wow animate animate__fadeInUp animation-delay-4">
                    <h3>Mobile</h3>
                    <p>{{$setting->phone2}}</p>
                </div>
                <hr>
                <div class="row ">
                    <div class="col-12 col-lg-4">
                        <div class="section-heading text-center text-lg-start mb-5 mb-lg-0">
                            <h2>We would love to <br> hear from you!</h2>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <form enctype="multipart/form-data" action="{{route('contacts.store')}}" method="post">
                            @csrf
                            <div class="row">
                                @include('frontend.partial.flash')
                                <div class="col-12">
                                    <div class="floating-label-group">
                                        <input value="{{ old('full_name') }}" type="text" name="full_name"
                                               id="full_name" class="form-control"
                                               required/>
                                        <label class="floating-label" for="full_name">Full Name*</label>
                                        @if($errors->has('full_name'))
                                            <small><span
                                                        class="text-danger">{{ $errors->first('full_name') }}</span></small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="floating-label-group">
                                        <input value="{{ old('email') }}" type="email" name="email" id="email"
                                               class="form-control" required/>
                                        <label class="floating-label" for="email">E-mail*</label>
                                        @if($errors->has('email'))
                                            <small><span
                                                        class="text-danger">{{ $errors->first('email') }}</span></small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="floating-label-group">
                                        <input value="{{ old('subject') }}" type="text" name="subject" id="subject"
                                               class="form-control" required/>
                                        <label class="floating-label" for="subject">Subject*</label>
                                        @if($errors->has('subject'))
                                            <small><span
                                                        class="text-danger">{{ $errors->first('subject') }}</span></small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="floating-label-group is-floating-label">
                                        <div class="is-floating-label">
                                            <label for="subject" class="floating-label">Message*</label>
                                            <textarea name="message" id="message" cols="30" rows="7"
                                                      class="form-control max-length" maxlength="6500" required>{{old('message')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="pdf-upload-btn custom-upload file">
                                        <label
                                                class="custom-upload__button button outline d-inline-flex gap-3 align-items-center w-auto"
                                                for="client_form_file_1" data-element="custom-upload-button">
                                            Upload attachment
                                            <img src="{{asset('frontend/images/icons/ic-actions-add-file.svg')}}"
                                                 alt="Donwload Icon">
                                        </label>
                                        <input class="custom-upload__input" name="attachment" accept=".pdf"
                                               id="client_form_file_1" type="file" data-behaviour="custom-upload-input"
                                        >
                                        <p class="note">You can only upload PDF files.
                                            <br> Maximum file size: 10 MB
                                        </p>
                                        @if($errors->has('attachment'))
                                            <div class="row">
                                                <div class="col-4 ml-3">
                                                    <small class="text-muted" style="font-size: 65%">
                                                        {{ $errors->first('attachment') }}
                                                    </small>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="button">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Info -->
@endsection