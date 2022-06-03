@extends('AdminDashboard.index')

@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->
            <!--begin::Row-->
            <div class="row">
                <div class="col-lg-6 col-xxl-12">
                    <div class="card-spacer">
                        <!--begin::Row-->
                        <div class="row text-center">
                            <div class="col-md-2 bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
								<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
									<i class="flaticon2-gear text-primary icon-3x"></i>
                                </span>
                                <a data-toggle="modal" data-target="#websiteModal" href="#"
                                   class="text-primary font-weight-bold font-size-h6">Website name</a>
                            </div>
                            <div class="col-md-2 bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
								<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
									<i class="flaticon2-gear text-primary icon-3x"></i>
                                </span>
                                <a data-toggle="modal" data-target="#logoModal" href="#"
                                   class="text-primary font-weight-bold font-size-h6">Logo</a>
                            </div>
                            <div class="col-md-2 bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
								<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
									<i class="flaticon2-gear text-primary icon-3x"></i>
                                </span>
                                <a data-toggle="modal" data-target="#coverModal" href="#"
                                   class="text-primary font-weight-bold font-size-h6">cover</a>
                            </div>
                            <div class="col-md-2 bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
								<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
									<i class="flaticon2-gear text-primary icon-3x"></i>
                                </span>
                                <a data-toggle="modal" data-target="#addressModal" href="#"
                                   class="text-primary font-weight-bold font-size-h6">address</a>
                            </div>
                            <div class="col-md-2 bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
								<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
									<i class="flaticon2-gear text-primary icon-3x"></i>
                                </span>
                                <a data-toggle="modal" data-target="#bioModal" href="#"
                                   class="text-primary font-weight-bold font-size-h6">bio</a>
                            </div>
                            <div class="col-md-2 bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
								<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
									<i class="flaticon2-gear text-primary icon-3x"></i>
                                </span>
                                <a data-toggle="modal" data-target="#emailModal" href="#"
                                   class="text-primary font-weight-bold font-size-h6">contact email</a>
                            </div>
                            <div class="col-md-2 bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
								<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
									<i class="flaticon2-gear text-primary icon-3x"></i>
                                </span>
                                <a data-toggle="modal" data-target="#phoneModal" href="#"
                                   class="text-primary font-weight-bold font-size-h6">phone</a>
                            </div>
                            <div class="col-md-2 bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
								<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
									<i class="flaticon2-gear text-primary icon-3x"></i>
                                </span>
                                <a data-toggle="modal" data-target="#linksModal" href="#"
                                   class="text-primary font-weight-bold font-size-h6">social_links</a>
                            </div>
                            <div class="col-md-2 bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
								<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
									<i class="flaticon2-gear text-primary icon-3x"></i>
                                </span>
                                <a data-toggle="modal" data-target="#sloganModal" href="#"
                                   class="text-primary font-weight-bold font-size-h6">slogan_text</a>
                            </div>
                            <div class="col-md-2 bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
								<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
									<i class="flaticon2-gear text-primary icon-3x"></i>
                                </span>
                                <a data-toggle="modal" data-target="#copyRightsModal" href="#"
                                   class="text-primary font-weight-bold font-size-h6">copy_right_text</a>
                            </div>
                            <div class="col-md-2 bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
								<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
									<i class="flaticon2-gear text-primary icon-3x"></i>
                                </span>
                                <a data-toggle="modal" data-target="#mainColorModal" href="#"
                                   class="text-primary font-weight-bold font-size-h6">main_color</a>
                            </div>
                            <div class="col-md-2 bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
								<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
									<i class="flaticon2-gear text-primary icon-3x"></i>
                                </span>
                                <a data-toggle="modal" data-target="#secondaryColorModal" href="#"
                                   class="text-primary font-weight-bold font-size-h6">secondary_color</a>
                            </div>

                        </div>
                        <!--end::Row-->

                    </div>
                </div>
            </div>

            {{--website name--}}
            <div class="modal fade" id="websiteModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{route('admin.settings.update',1)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Website name</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>website Name
                                        <span class="text-danger">*</span></label>
                                    <input required value="{{$setting->website_name}}" type="text" name="website_name"
                                           class="form-control"
                                           placeholder="Enter website_name name"/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-primary font-weight-bold"
                                        data-dismiss="modal">Close
                                </button>
                                <button type="submit" class="btn btn-primary font-weight-bold">Save changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{--logo--}}
            <div class="modal fade" id="logoModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{route('admin.settings.update',1)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit logo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>website logo
                                        <span class="text-danger">*</span></label>
                                    <input required type="file" name="logo"class="form-control" placeholder="Enter logo"/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-primary font-weight-bold"
                                        data-dismiss="modal">Close
                                </button>
                                <button type="submit" class="btn btn-primary font-weight-bold">Save changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{--cover--}}
            <div class="modal fade" id="coverModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{route('admin.settings.update',1)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Address</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>website cover
                                        <span class="text-danger">*</span></label>
                                    <input required type="file" name="cover"
                                           class="form-control"
                                           placeholder="Enter website_name name"/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-primary font-weight-bold"
                                        data-dismiss="modal">Close
                                </button>
                                <button type="submit" class="btn btn-primary font-weight-bold">Save changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{--address--}}
            <div class="modal fade" id="addressModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{route('admin.settings.update',1)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Address</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>website Address
                                        <span class="text-danger">*</span></label>
                                    <input required value="{{$setting->address}}" type="text" name="address"
                                           class="form-control"
                                           placeholder="Enter website_name name"/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-primary font-weight-bold"
                                        data-dismiss="modal">Close
                                </button>
                                <button type="submit" class="btn btn-primary font-weight-bold">Save changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{--bio--}}
            <div class="modal fade" id="bioModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{route('admin.settings.update',1)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Bio</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>bio
                                        <span class="text-danger">*</span></label>
                                    <input required value="{{$setting->bio}}" type="text" name="bio"
                                           class="form-control"
                                           placeholder="Enter website_name name"/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-primary font-weight-bold"
                                        data-dismiss="modal">Close
                                </button>
                                <button type="submit" class="btn btn-primary font-weight-bold">Save changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{--email--}}
            <div class="modal fade" id="emailModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{route('admin.settings.update',1)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Contact Email</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>website Address
                                        <span class="text-danger">*</span></label>
                                    <input required value="{{$setting->contact_email}}" type="text" name="contact_email"
                                           class="form-control"
                                           placeholder="Enter contact_email name"/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-primary font-weight-bold"
                                        data-dismiss="modal">Close
                                </button>
                                <button type="submit" class="btn btn-primary font-weight-bold">Save changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{--phone--}}
            <div class="modal fade" id="phoneModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{route('admin.settings.update',1)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit phone</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>website phone
                                        <span class="text-danger">*</span></label>
                                    <input required value="{{$setting->phone}}" type="text" name="phone"
                                           class="form-control"
                                           placeholder="Enter phone"/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-primary font-weight-bold"
                                        data-dismiss="modal">Close
                                </button>
                                <button type="submit" class="btn btn-primary font-weight-bold">Save changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{--social_links--}}
            <div class="modal fade" id="linksModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{route('admin.settings.update',1)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit social_links</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>website Address
                                        <span class="text-danger">*</span></label>
                                    <input required value="{{$setting->social_links}}" type="text" name="social_links"
                                           class="form-control"
                                           placeholder="Enter social_links"/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-primary font-weight-bold"
                                        data-dismiss="modal">Close
                                </button>
                                <button type="submit" class="btn btn-primary font-weight-bold">Save changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{--slogan_text--}}
            <div class="modal fade" id="sloganModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{route('admin.settings.update',1)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit slogan_text</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>slogan_text
                                        <span class="text-danger">*</span></label>
                                    <input required value="{{$setting->slogan_text}}" type="text" name="slogan_text"
                                           class="form-control"
                                           placeholder="Enter slogan_text"/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-primary font-weight-bold"
                                        data-dismiss="modal">Close
                                </button>
                                <button type="submit" class="btn btn-primary font-weight-bold">Save changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{--copy_right_text--}}
            <div class="modal fade" id="copyRightsModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{route('admin.settings.update',1)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit copy_right_text</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>copy_right_text
                                        <span class="text-danger">*</span></label>
                                    <input required value="{{$setting->copy_right_text}}" type="text" name="copy_right_text"
                                           class="form-control"
                                           placeholder="Enter copy_right_text"/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-primary font-weight-bold"
                                        data-dismiss="modal">Close
                                </button>
                                <button type="submit" class="btn btn-primary font-weight-bold">Save changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{--main_color--}}
            <div class="modal fade" id="mainColorModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{route('admin.settings.update',1)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit main_color</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>website main_color
                                        <span class="text-danger">*</span></label>
                                    <input required value="{{$setting->main_color}}" type="color" name="main_color"
                                           class="form-control"
                                           placeholder="Enter main_color"/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-primary font-weight-bold"
                                        data-dismiss="modal">Close
                                </button>
                                <button type="submit" class="btn btn-primary font-weight-bold">Save changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{--secondary_color--}}
            <div class="modal fade" id="secondaryColorModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{route('admin.settings.update',1)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit secondary_color</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>website secondary_color
                                        <span class="text-danger">*</span></label>
                                    <input required value="{{$setting->secondary_color}}" type="color" name="secondary_color"
                                           class="form-control"
                                           placeholder="Enter secondary_color"/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-primary font-weight-bold"
                                        data-dismiss="modal">Close
                                </button>
                                <button type="submit" class="btn btn-primary font-weight-bold">Save changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection