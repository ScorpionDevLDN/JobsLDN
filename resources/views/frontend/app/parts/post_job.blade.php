<div class="modal fade" id="post-job" tabindex="-1" aria-labelledby="postJobLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="postJobLabel">Create a new job post</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <ion-icon name="close-outline"></ion-icon>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" class="px-0" action="{{route('company-jobs.store')}}" method="post">
                    @csrf
                    <div class="row gap-50">
                        <div class="col-12">
                            <div class="floating-label-group">
                                <input type="text" name="title" id="title" class="form-control" required/>
                                <label class="floating-label" for="title">Title*</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="floating-label-group is-floating-label temp-textarea-label">
                                <div class="is-floating-label temp-textarea-label">
                                    <label for="summary" class="floating-label">Summary *</label>
                                    <textarea name="summery" id="summary" cols="30" rows="7"
                                              class="form-control max-length"
                                              maxlength="6500" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="floating-label-group">
                                <input name="salary" id="salary1" class="form-control" required
                                       type='number'
                                       inputMode='decimal'
                                       placeholder=''
                                       onFocus="this.type='number'; this.value=this.lastValue"
                                       onBlur="this.type=''; this.lastValue=this.value; this.value=this.value==''?'':(+this.value).toLocaleString()"
                                />
                                <label class="floating-label" for="salary1">Salary*</label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <select class="select-2-select modal-select w-100" name="currency_id" required>
                                <option value="">Currency*</option>
                                @foreach($currencies as $currency)
                                    <option value="{{$currency->id}}">{{$currency->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <select class="select-2-select modal-select" name="per_id" required>
                                <option value="">Annually*</option>
                                @foreach($pers as $per)
                                    <option value="{{$per->id}}">{{$per->per}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <select class="select-2-select modal-select  w-100" name="type_id" required>
                                <option value="">Type*</option>
                                @foreach($types as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <select class="select-2-select modal-select w-100" name="category_id" required>
                                <option value="">Category*</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <select class="select-2-select modal-select w-100" name="city_id" required>
                                <option value="">City*</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 position-relative">
                            <input disabled value="{{today()->addDays(8)->format('d-m-Y')}}" class="form-control date" name="expired_at" type="text" id="datepicker">
                            <img src="{{asset('frontend/images/icons/date.svg')}}" alt="Date" class="date-icon">
                            <p class="note pt-1">Expiry Date</p>
                        </div>
                        <div class="col-12">
                            <div class="floating-label-group">
                                <input type="email" name="job_post_email" id="job_post_email" class="form-control"
                                       required/>
                                <label class="floating-label" for="job_post_email">Email*</label>
                                <p class="note pt-1">Make sure that you are
                                    using a professional email address.</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="pdf-upload-btn custom-upload file">
                                <label class="custom-upload__button button outline d-inline-flex gap-3 align-items-center w-auto"
                                       for="client_form_file" data-element="custom-upload-button">
                                    <img src="{{asset('frontend/images/icons/upload.svg')}}" alt="Upload Icon">
                                    Attach Job Details
                                </label>
                                <input class="custom-upload__input" name="pdf_details" accept=".pdf"
                                       id="client_form_file"
                                       type="file" data-behaviour="custom-upload-input">
                                <p class="note">You can only upload PDF files.
                                    <br> Maximum file size: 10 MB
                                </p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="super-post">
                                <div class="row">
                                    <div class="col-12">
                                        <h3>{{$payment_setting->title}}</h3>
                                        <p class="super-post-text">
                                            {{$payment_setting->description}}
                                        </p>
                                        <p class="checkboxes d-inline">
                                            <input id="check" type="checkbox" name="is_super_post" value="1">
                                            <label for="check">
                                                {{$payment_setting->text}}
                                            </label>
                                        </p>
                                    </div>
                                    <div class="col-12 position-relative">
                                        <img src="{{$payment_setting->image}}" alt="Super Post" class="super-post-img">
                                        <div class="secured-by d-flex align-items-end gap-3">
                                            <p>Secured by</p>
                                            <img src="{{asset('frontend/images/paypal.svg')}}" alt="Paypal"
                                                 class="paypal">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center mt-50">
                            <button type="submit" class="button w-50">Post a job</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>