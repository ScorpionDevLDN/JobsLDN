@extends('JobsLdn.Layout.index')
@section('content')
    <!-- Start Header -->
    @include('JobsLdn.Layout.nav')
    <!-- Start Page Banner Section -->
    <section class="page-banner contact" id="page-banner">
        <div class="container">
            <div class="row position-relative">
                <div class="col-12 col-xl-8">
                    <h1 class="py-5 py-xl-0">Contact</h1>
                </div>
                <div class="col-12 col-xl-4 d-none d-xl-block text-end">
                    <img src="{{asset('jobs/images/page-banners/contact_banner.svg')}}" alt="Person" class="contact-banner">
                </div>
            </div>
        </div>
    </section>
    <!-- End Page Banner Section -->

    <!-- Start Contact Info -->
    <section class="contact-info pt-0" id="contact-info">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-start">
                <div class="col-6 col-sm-6 col-xl-3">
                    <h3>Our Office</h3>
                    <p>{{$setting->address}}</p>
                </div>
                <div class="col-6 col-sm-6 col-xl-3">
                    <h3>E-mail</h3>
                    <p>{{$setting->contact_email}}</p>
                </div>
                <div class="col-6 col-sm-6 col-xl-3">
                    <h3>Phone</h3>
                    <p>{{$setting->phone}}</p>
                </div>
                <div class="col-6 col-sm-6 col-xl-3">
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
                                <div class="col-12">
                                    <div class="floating-label-group">
                                        <input value="{{ old('full_name') }}"
                                               type="text" name="full_name" id="full_name" class="form-control"
                                               required />
                                        <label class="floating-label" for="full_name">Full Name*</label>
                                        @if($errors->has('full_name'))
                                            <small><span class="text-danger">{{ $errors->first('full_name') }}</span></small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="floating-label-group">
                                        <input value="{{ old('email') }}" type="text" name="email" id="email" class="form-control"
                                               required />
                                        <label class="floating-label" for="email">E-mail*</label>
                                        @if($errors->has('email'))
                                            <small><span class="text-danger">{{ $errors->first('email') }}</span></small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="floating-label-group">
                                        <input value="{{ old('subject') }}" type="text" name="subject" id="subject" class="form-control"
                                               required />
                                        <label class="floating-label" for="subject" >Subject*</label>
                                        @if($errors->has('subject'))
                                            <small><span class="text-danger">{{ $errors->first('subject') }}</span></small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="floating-label-group is-floating-label">
                                        <div class="is-floating-label">
                                            <label for="subject"  class="floating-label" >Message*</label>
                                            <textarea name="message" id="message" cols="30" rows="7"  class="form-control max-length" maxlength="400" required>{{old('message')}}</textarea>
                                            @if($errors->has('message'))
                                                <small><span class="text-danger">{{ $errors->first('message') }}</span></small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="pdf-upload-btn custom-upload file">
                                        <label class="custom-upload__button button outline d-inline-flex gap-3 align-items-center w-auto" for="client_form_file"
                                               data-element="custom-upload-button">
                                            Upload attachment
                                            <img src="{{asset('jobs/images/icons/ic-actions-add-file.svg')}}" alt="Donwload Icon">
                                        </label>
                                        <input value="{{ old('attachment') }}" class="custom-upload__input" name="attachment"
                                               accept=".png,.jpeg,.jpg" id="client_form_file" type="file"
                                               data-behaviour="custom-upload-input" required>
                                        <p class="note">Only PDF allowed to upload it.
                                            <br>   Maximum file size: 10 MB</p>
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
                                <div class="col-12 text-center">
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