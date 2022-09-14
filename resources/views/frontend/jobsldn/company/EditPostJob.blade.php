@php $menu = 'jobs';@endphp
@extends('frontend.jobsldn.app.parts.layout')

@section('content')
    <!-- Start Page Banner Section -->
    <section class="page-banner contact" id="page-banner">
        <div class="container">
            <div class="row position-relative">
                <div class="col-12 col-lg-8">
                    <h1 class="py-5 py-lg-0">Edit {{$job->title}} Job</h1>
                </div>
                <div class="col-12 col-lg-4 text-center text-lg-end">
                    <img src="{{asset('jobsldn/images/page-banners/post-a-job.svg')}}" alt="Person"
                         class="post-a-job-banner">
                </div>
            </div>
        </div>
    </section>
    <!-- End Page Banner Section -->

    <!-- Start Post A Job Content -->
    <section class="post-a-job-content pt-0" id="post-a-job-content">
        <div class="container">
            <form action="{{route('company-jobs.update',$job->id)}}" method="post">
                @csrf
                @method('put')
                <div class="row mt-5">
                    <div class="col-12 col-lg-3">
                        <div class="account-type account-col">
                            <h3>Summery</h3>
                            <p>It's your chance
                                to write a compelling job description to attract the best talent!</p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9">
                        <div class="row gap-50">
                            <div class="col-12">
                                <div class="floating-label-group">
                                    <input value="{{$job->title ?? old('title')}}" type="text" name="title" id="title"
                                           class="form-control" required/>
                                    <label class="floating-label" for="title">Job Title*</label>
                                    <span class="text-danger">@error('title'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="floating-label-group is-floating-label temp-textarea-label">
                                    <div class="is-floating-label temp-textarea-label">
                                        <label for="summery" class="floating-label">Summery *</label>
                                        <textarea name="summery" id="summery" cols="30" rows="7"
                                                  class="form-control max-length" maxlength="6500"
                                                  required>{{$job->summery ?? old('summery')}}</textarea>
                                        <span class="text-danger">@error('summery'){{$message}}@enderror</span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="pdf-upload-btn custom-upload file">
                                    <label
                                            class="custom-upload__button button outline d-inline-flex gap-3 align-items-center w-auto"
                                            for="client_form_file" data-element="custom-upload-button">
                                        <img src="{{asset('jobsldn/images/icons/upload.svg')}}" alt="Upload Icon">
                                        Attach Job Details
                                    </label>
                                    <input class="custom-upload__input" name="pdf_details" accept=".pdf"
                                           id="client_form_file" type="file" data-behaviour="custom-upload-input">
                                    <p class="note">You can only upload PDF files.
                                        <br> Maximum file size: 10 MB
                                    </p>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 col-lg-3">
                        <div class="account-type account-col">
                            <h3>Job Info</h3>
                            <p>Remember: Transparency improves talent acquisition.</p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9">
                        <div class="row gap-50">
                            <div class="col-12 col-lg-6">
                                <select class="select-2-select filter-input w-100" name="category_id" required>
                                    <option selected disabled value="">Category*</option>
                                    @foreach($categories as $category)
                                        <option {{$job->category_id || old('category_id') == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('category_id'){{$message}}@enderror</span>
                            </div>
                            <div class="col-12 col-lg-6">
                                <select class="select-2-select filter-input w-100" name="city_id" required>
                                    <option disabled selected value="city">City*</option>
                                    @foreach($cities as $city)
                                        <option {{$job->city_id || old('city_id') == $city->id ? 'selected'  :''}} value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('city_id'){{$message}}@enderror</span>
                            </div>
                            <div class="col-12 col-lg-6">
                                <select class="select-2-select filter-input w-100" name="type_id" required>
                                    <option disabled selected value="type">Type*</option>
                                    @foreach($types as $type)
                                        <option {{$job->type_id || old('type_id') == $type->id ? 'selected'  :''}} value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('type_id'){{$message}}@enderror</span>
                            </div>
                            <div class="col-12 col-lg-6">
                                <input value="{{$job->salary ?? old('salary')}}" type="text" name="salary" placeholder="Salary*"
                                       class="form-control salary"
                                       id="salary" required>
                                <span class="text-danger">@error('salary'){{$message}}@enderror</span>
                            </div>
                            <div class="col-12 col-lg-6">
                                <select class="select-2-select filter-input w-100" name="currency_id" required>
                                    <option disabled selected value="currency">Currency*</option>
                                    @foreach($currencies as $currency)
                                        <option {{$job->currency_id || old('currency_id') == $currency->id ? 'selected'  :''}} value="{{$currency->id}}">{{$currency->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('currency_id'){{$message}}@enderror</span>
                            </div>
                            <div class="col-12 col-lg-6">
                                <select class="select-2-select filter-input w-100" name="per_id" required>
                                    <option value="per">Per*</option>
                                    @foreach($pers as $per)
                                        <option {{$job->per_id || old('per_id') == $per->id ? 'selected'  :''}} value="{{$per->id}}">{{$per->per}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('per_id'){{$message}}@enderror</span>

                            </div>
                            <div class="col-12 col-lg-6 position-relative">
                                <input value="{{$job->expired_at ?? old('expired_at')}}" class="form-control date" name="expired_at"
                                       type="date" id="example-date-input">
                                <span class="text-danger">@error('expired_at'){{$message}}@enderror</span>
                            </div>
                            <div class="col-12 col-lg-6">
                                <input value="{{$job->job_post_email ?? old('job_post_email')}}" type="email" name="job_post_email"
                                       placeholder="E-mail*"
                                       class="form-control email"
                                       id="email" required>
                                <p class="note pt-1">Make sure that you are
                                    using a professional email address.</p>
                                <span class="text-danger">@error('job_post_email'){{$message}}@enderror</span>
                            </div>
                            <div class="col-12">
                                <div class="super-post">
                                    <div class="row">
                                        <div class="col-12 col-lg-7">
                                            <h2>{{$payment_setting->title}}</h2>
                                            <p class="super-post-text">{{$payment_setting->description}}</p>
                                            <p class="checkboxes d-inline">
                                                <input id="check" type="checkbox" name="is_super_post" value="1">
                                                <label for="check">
                                                    {{$payment_setting->text}}
                                                </label>
                                            </p>
                                        </div>
                                        <div class="col-12 col-lg-5 position-relative">
                                            <img src="{{$payment_setting->image}}" alt="Super Post"
                                                 class="super-post-img">
                                            <div class="secured-by d-flex align-items-end gap-3">
                                                <p>Secured by</p>
                                                <img src="{{asset('jobsldn/images/paypal.svg')}}" alt="Paypal"
                                                     class="paypal">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex align-items-center gap-5">
                                <button type="submit" class="button">Post a job</button>
                                <a href="{{route('company-jobs.index')}}" class="cancel-button">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- End Post A Job Content -->
@endsection