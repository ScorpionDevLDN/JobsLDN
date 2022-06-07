@extends('AdminDashboard.index')

@section('title' ,'Setting')
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
                            <div class="col-md-2 bg-primary px-6 py-8 rounded-xl mr-7 mb-7">
								<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
									<i class="text-light flaticon2-magnifier-tool text-primary icon-3x"></i>
                                </span>
                                <a data-toggle="modal" data-target="#websiteModal" href="#"
                                   class="text-light font-weight-bold font-size-h6">Website name</a>
                            </div>
                            <div class="col-md-2 bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
								<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
									<i class="flaticon2-photo-camera text-success icon-3x"></i>
                                </span>
                                <a data-toggle="modal" data-target="#logoModal" href="#"
                                   class="text-success font-weight-bold font-size-h6">Logo</a>
                            </div>
                            <div class="col-md-2 bg-light-danger px-6 py-8 rounded-xl mr-7 mb-7">
								<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
									<i class="far fa-image text-danger icon-3x"></i>
                                </span>
                                <a data-toggle="modal" data-target="#coverModal" href="#"
                                   class="text-danger font-weight-bold font-size-h6">cover</a>
                            </div>
                            <div class="col-md-2 bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
								<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
									<i class="fas fa-map-marker-alt text-warning icon-3x"></i>
                                </span>
                                <a data-toggle="modal" data-target="#addressModal" href="#"
                                   class="text-warning font-weight-bold font-size-h6">address</a>
                            </div>
                            <div class="col-md-2 bg-light-info px-6 py-8 rounded-xl mr-7 mb-7">
								<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
									<i class="fas fa-info-circle text-info icon-3x"></i>
                                </span>
                                <a data-toggle="modal" data-target="#bioModal" href="#"
                                   class="text-info font-weight-bold font-size-h6">bio</a>
                            </div>
                            <div class="col-md-2 bg-light-secondary px-6 py-8 rounded-xl mr-7 mb-7">
								<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
									<i class="flaticon-multimedia-2 text-secondary icon-3x"></i>
                                </span>
                                <a data-toggle="modal" data-target="#emailModal" href="#"
                                   class="text-secondary font-weight-bold font-size-h6">Contact Email</a>
                            </div>
                            <div class="col-md-2 bg-light-success px-6 py-8 rounded-xl mr-7 mb-7">
								<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
									<i class="flaticon2-phone text-success icon-3x"></i>
                                </span>
                                <a data-toggle="modal" data-target="#phoneModal" href="#"
                                   class="text-dark font-weight-bold font-size-h6">phone</a>
                            </div>
                            <div class="col-md-2 px-6 py-8 rounded-xl mr-7 mb-7">
								<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
									<i style="color: #271de3" class="flaticon-facebook-letter-logo icon-3x"></i>
                                </span>
                                <a style="color: #271de3" data-toggle="modal" data-target="#linksModal" href="#"
                                   class="font-weight-bold font-size-h6">Social Links</a>
                            </div>
                            <div class="col-md-2 px-6 py-8 rounded-xl mr-7 mb-7" style="background-color: #e6b8b8">
								<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
									<i class="flaticon-edit-1 text-dark icon-3x"></i>
                                </span>
                                <a data-toggle="modal" data-target="#sloganModal" href="#"
                                   class="text-dark font-weight-bold font-size-h6">Slogan Text</a>
                            </div>
                            <div class="col-md-2 px-6 py-8 rounded-xl mr-7 mb-7" style="background-color: #c7b3e3">
								<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
									<i class="far fa-copyright text-secondary icon-3x"></i>
                                </span>
                                <a data-toggle="modal" data-target="#copyRightsModal" href="#"
                                   class="text-dark font-weight-bold font-size-h6">Copy Right Text</a>
                            </div>
                            <div class="col-md-2 px-6 py-8 rounded-xl mr-7 mb-7" style="background-color: {{$setting->main_color}}">
								<span class=" svg-icon svg-icon-3x svg-icon-warning d-block my-2">
									<i class="text-light flaticon2-pen icon-3x"></i>
                                </span>
                                <a data-toggle="modal" data-target="#mainColorModal" href="#"
                                   class="text-light font-weight-bold font-size-h6">Main Color</a>
                            </div>
                            <div class="col-md-2 px-6 py-8 rounded-xl mr-7 mb-7" style="background-color: {{$setting->secondary_color}}">
								<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
									<i class="fa fa-fill-drip text-primary icon-3x"></i>
                                </span>
                                <a data-toggle="modal" data-target="#secondaryColorModal" href="#"
                                   class="text-primary font-weight-bold font-size-h6">Secondary Color</a>
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
                    <form enctype="multipart/form-data" action="{{route('admin.settings.update',1)}}" method="post">
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
                                <div class="custom-file">
                                    <input name="logo" type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
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
                    <form enctype="multipart/form-data" action="{{route('admin.settings.update',1)}}" method="post">
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
                                <div class="custom-file">
                                    <input name="cover" type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
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
                                    <input required value="{{$setting->copy_right_text}}" type="text"
                                           name="copy_right_text"
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
                                    <input required value="{{$setting->secondary_color}}" type="color"
                                           name="secondary_color"
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