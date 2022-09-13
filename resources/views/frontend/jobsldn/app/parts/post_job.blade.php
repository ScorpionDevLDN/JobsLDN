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
                <form class="px-0">
                    <div class="row gap-50">
                        <div class="col-12">
                            <div class="floating-label-group">
                                <input type="text" name="title" id="title" class="form-control" required />
                                <label class="floating-label" for="title">Title*</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="floating-label-group is-floating-label temp-textarea-label">
                                <div class="is-floating-label temp-textarea-label">
                                    <label for="summary" class="floating-label">Summary *</label>
                                    <textarea name="summary" id="summary" cols="30" rows="7" class="form-control max-length"
                                              maxlength="6500" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="floating-label-group">
                                <input type="text" name="salary" id="salary" class="form-control" required />
                                <label class="floating-label" for="salary">Salary*</label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <select class="select-2-select  w-100" name="currency" required>
                                <option value="">Currency*</option>
                                <option value="1">Currency 1</option>
                                <option value="2">Currency 2</option>
                                <option value="3">Currency 3</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <select class="select-2-select" name="per" required>
                                <option value="">Annually*</option>
                                <option value="1">Annually 1</option>
                                <option value="2">Annually 2</option>
                                <option value="3">Annually 3</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <select class="select-2-select  w-100" name="type" required>
                                <option value="">Type*</option>
                                <option value="1">Type 1</option>
                                <option value="2">Type 2</option>
                                <option value="3">Type 3</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <select class="select-2-select  w-100" name="category" required>
                                <option value="">Category*</option>
                                <option value="1">Graphics Designer</option>
                                <option value="2">Project Manager</option>
                                <option value="3">Teach Engineer</option>
                                <option value="4">Front End Dev</option>
                                <option value="5">Back End Dev</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <select class="select-2-select  w-100" name="city" required>
                                <option value="">City*</option>
                                <option value="1">USA</option>
                                <option value="2">UK</option>

                                <option value="4">Saudi Arabia</option>
                            </select>
                        </div>
                        <div class="col-12 position-relative">
                            <input type="text" name="datepicker" placeholder="Expiration Date*" class="form-control date"
                                   id="datepicker" required>
                            <img src="images/icons/date.svg" alt="Date" class="date-icon">
                        </div>
                        <div class="col-12">
                            <div class="floating-label-group">
                                <input type="email" name="email" id="email" class="form-control"
                                       required />
                                <label class="floating-label" for="last_name">Email*</label>
                                <p class="note pt-1">Make sure that you are
                                    using a professional email address.</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="pdf-upload-btn custom-upload file">
                                <label class="custom-upload__button button outline d-inline-flex gap-3 align-items-center w-auto"
                                       for="client_form_file" data-element="custom-upload-button">
                                    <img src="images/icons/upload.svg" alt="Upload Icon">
                                    Attach Job Details
                                </label>
                                <input class="custom-upload__input" name="client_form_file" accept=".pdf" id="client_form_file"
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
                                        <h3>Super Post</h3>
                                        <p class="super-post-text">There is no need to keep your post lost among thousands
                                            of job posts. Now you can publish this ad to have priority on
                                            these pages for 5 days for £16.99 only - Excluding VAT.</p>
                                        <p class="checkboxes d-inline">
                                            <input id="check" type="checkbox" name="check">
                                            <label for="check">
                                                Make this post as Super Post.
                                            </label>
                                        </p>
                                    </div>
                                    <div class="col-12 position-relative">
                                        <img src="images/super-post.svg" alt="Super Post" class="super-post-img">
                                        <div class="secured-by d-flex align-items-end gap-3">
                                            <p>Secured by</p>
                                            <img src="images/paypal.svg" alt="Paypal" class="paypal">
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