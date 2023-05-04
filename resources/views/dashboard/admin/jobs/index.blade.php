@extends('AdminDashboard.index')
@section('breadcrumb')
    <a href="{{ route('admin.get-jobs.index') }}" class="btn">Jobs</a>
@endsection
@section('title', 'Jobs')
@section('content')
    <div class="container">
        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h3 class="card-label">Jobs
                        <div class="text-muted pt-2 font-size-sm"></div>
                    </h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline mr-2">
                        <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="svg-icon svg-icon-md">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                                    version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                            fill="#000000" opacity="0.3" />
                                        <path
                                            d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                            fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>Export
                        </button>
                        <!--begin::Dropdown Menu-->
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <!--begin::Navigation-->
                            <ul class="navi flex-column navi-hover py-2">
                                <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                    Choose an option:
                                </li>
                                <li class="navi-item">
                                    <a onclick="HtmlTOExcel()" id="exl" href="#" class="navi-link">
                                        <span class="navi-icon">
                                            <i class="la la-file-excel-o"></i>
                                        </span>
                                        <span class="navi-text">Excel</span>
                                    </a>
                                </li>
                            </ul>
                            <!--end::Navigation-->
                        </div>
                        <!--end::Dropdown Menu-->
                    </div>
                    {{--                    <!--end::Dropdown--> --}}
                    {{--                    <!--begin::Button--> --}}


                    <!-- Button trigger modal-->
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="tableToExcel" class="table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Job Company</th>
                            <th scope="col">Job Title</th>
                            <th scope="col">Job status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $i => $job)
                            <tr>
                                <th>{{ ++$i }}</th>
                                <td>{{ $job->company->company_name }}</td>
                                <td>{{ $job->title }}</td>
                                <td> {{ $job->chechStatus() }}
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-1 pr-10" style="margin-left: -10px;">
                                            <div class="pretty p-icon p-toggle p-plain btn btn-light-info btn-icon">
                                                <input name="shown" data-id="{{ $job->id }}" class="toggle-class-sad"
                                                    type="checkbox" {{ $job->shown ? 'checked' : '' }}>
                                                <div class="state p-success-o p-on">
                                                    <i class="fas fa-eye"></i>
                                                </div>
                                                <div class="state p-off ">
                                                    <i class="fas fa-eye-slash"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1 pr-10">
                                            <a href="#" class="btn btn-light-info font-weight-bold btn-icon"
                                                data-toggle="modal" data-target="#exampleModalShow{{ $job->id }}">
                                                <span class="svg-icon svg-icon-2x">
                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Code/Info-circle.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24"
                                                                height="24" />
                                                            <circle fill="#000000" opacity="0.3" cx="12"
                                                                cy="12" r="10" />
                                                            <rect fill="#000000" x="11" y="10"
                                                                width="2" height="7" rx="1" />
                                                            <rect fill="#000000" x="11" y="7"
                                                                width="2" height="2" rx="1" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>

                                            </a>
                                        </div>
                                        <div class="modal fade" id="exampleModalShow{{ $job->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                {{--                                            <form action="{{route('admin.categories.update',$job->id)}}" method="post"> --}}
                                                {{--                                                @method('put') --}}
                                                {{--                                                @csrf --}}
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Post Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Company Name
                                                                <span class="text-danger">*</span></label>
                                                            <input disabled required
                                                                value="{{ $job->company->company_name }}" type="text"
                                                                name="name" class="form-control"
                                                                placeholder="Enter category name" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Job Title
                                                                <span class="text-danger">*</span></label>
                                                            <input disabled required
                                                                value="{{ $job->title }} - ({{ $job->applicants_count }} Applicant)"
                                                                type="text" name="name" class="form-control"
                                                                placeholder="Enter category name" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Job Summary
                                                                <span class="text-danger">*</span></label>

                                                            <textarea id="summernote" name="summery">{{ $job->summery }}</textarea>

                                                        </div>

                                                        <div class="form-group">
                                                            <label>Job Details
                                                                <span class="text-danger">*</span></label>
                                                            <embed src="{{ asset('storage/' . $job->pdf_details) }}"
                                                                type="application/pdf" width="100%" height="100%">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Job Location
                                                                <span class="text-danger">*</span></label>
                                                            <input disabled required value="{{ $job->city->name }}"
                                                                type="text" name="name" class="form-control"
                                                                placeholder="Enter category name" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Is Super Post
                                                                <span class="text-danger">*</span></label>
                                                            <input disabled required
                                                                value="{{ $job->is_super_post ? 'true' : 'false' }}"
                                                                type="text" name="is_super_post" class="form-control"
                                                                placeholder="Enter is_super_post" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Job Type
                                                                <span class="text-danger">*</span></label>
                                                            <input disabled required value="{{ $job->type->name }}"
                                                                type="text" name="name" class="form-control"
                                                                placeholder="Enter category name" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Job Salary
                                                                <span class="text-danger">*</span></label>
                                                            <input disabled required
                                                                value="{{ $job->salary }} {{ $job->currency->symbol }} /{{ $job->per->per }} "
                                                                type="text" name="name" class="form-control"
                                                                placeholder="Enter category name" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Job Email</label>
                                                            <input disabled required value="{{ $job->job_post_email }}"
                                                                type="text" name="name" class="form-control"
                                                                placeholder="Enter category name" />
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        @if ($job->status == 0)
                                                            <div class="col-1 mx-2">
                                                                <a href="{{ route('admin.accept', $job->id) }}"
                                                                    class="btn btn-light-success font-weight-bold btn-icon">
                                                                    <span class="svg-icon svg-icon-2x">
                                                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Check.svg--><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            width="24px" height="24px"
                                                                            viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1"
                                                                                fill="none" fill-rule="evenodd">
                                                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                                                <path
                                                                                    d="M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z"
                                                                                    fill="#000000" fill-rule="nonzero"
                                                                                    transform="translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002) " />
                                                                            </g>
                                                                        </svg>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="col-1 mx-2">
                                                                <a href="{{ route('admin.reject', $job->id) }}"
                                                                    class="btn btn-light-danger font-weight-bold btn-icon">
                                                                    <span class="svg-icon svg-icon-2x">
                                                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Close.svg--><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            width="24px" height="24px"
                                                                            viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1"
                                                                                fill="none" fill-rule="evenodd">
                                                                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                                                                    fill="#000000">
                                                                                    <rect x="0" y="7"
                                                                                        width="16" height="2"
                                                                                        rx="1" />
                                                                                    <rect opacity="0.3"
                                                                                        transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) "
                                                                                        x="0" y="7"
                                                                                        width="16" height="2"
                                                                                        rx="1" />
                                                                                </g>
                                                                            </g>
                                                                        </svg>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                {{--                                            </form> --}}
                                            </div>
                                        </div>

                                        @if ($job->status == 0)
                                            <div class="col-1">
                                                <a href="#" class="btn btn-light-success font-weight-bold btn-icon"
                                                    data-toggle="modal"
                                                    data-target="#exampleModalEdit{{ $job->id }}">
                                                    <span class="svg-icon svg-icon-2x">
                                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Design/Edit.svg--><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24"
                                                                    height="24" />
                                                                <path
                                                                    d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                                    fill="#000000" fill-rule="nonzero"
                                                                    transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                                                <rect fill="#000000" opacity="0.3" x="5"
                                                                    y="20" width="15" height="2"
                                                                    rx="1" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal-->
                            <div class="modal fade" id="exampleModalEdit{{ $job->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form enctype="multipart/form-data"
                                        action="{{ route('admin.get-jobs.update', $job->id) }}" method="post">
                                        @method('put')
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Job Title
                                                        <span class="text-danger">*</span></label>
                                                    <input required value="{{ $job->title }}" type="text"
                                                        name="title" class="form-control"
                                                        placeholder="Enter post title" />
                                                </div>

                                                <div class="form-group">
                                                    <label>Job Summary
                                                        <span class="text-danger">*</span></label>
                                                    <textarea id="summernote2" name="summery">{{ $job->summery }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Job Details
                                                        <span class="text-danger"></span></label>
                                                    <input value="{{ $job->pdf_details }}" type="file"
                                                        name="pdf_details" class="form-control"
                                                        placeholder="Enter post summery" />
                                                    <embed src="{{ asset('storage/' . $job->pdf_details) }}"
                                                        type="application/pdf" width="100%" height="100%">
                                                </div>
                                                <div class="form-group">
                                                    <label>Job Location
                                                        <span class="text-danger">*</span></label>
                                                    <select name="city_id" class="form-control" id="exampleSelectd">
                                                        @foreach ($cities as $city)
                                                            <option {{ $city->id == $job->city_id ? 'selected' : '' }}
                                                                value="{{ $city->id }}">{{ $city->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Is Super Post
                                                        <span class="text-danger">*</span></label>
                                                    <input disabled required
                                                        value="{{ $job->is_super_post ? 'true' : 'false' }}"
                                                        type="text" name="is_super_post" class="form-control"
                                                        placeholder="Enter is_super_post" />
                                                </div>

                                                <div class="form-group">
                                                    <label>Job Type
                                                        <span class="text-danger">*</span></label>
                                                    <select name="type_id" class="form-control" id="exampleSelectd">
                                                        @foreach ($types as $type)
                                                            <option {{ $type->id == $job->type_id ? 'selected' : '' }}
                                                                value="{{ $type->id }}">{{ $type->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Job Category
                                                        <span class="text-danger">*</span></label>
                                                    <select name="category_id" class="form-control" id="exampleSelectd">
                                                        @foreach ($categories as $category)
                                                            <option
                                                                {{ $category->id == $job->category_id ? 'selected' : '' }}
                                                                value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Job Currency
                                                        <span class="text-danger">*</span></label>
                                                    <select name="currency_id" class="form-control" id="exampleSelectd">
                                                        @foreach ($currencies as $currency)
                                                            <option
                                                                {{ $currency->id == $job->currency_id ? 'selected' : '' }}
                                                                value="{{ $currency->id }}">{{ $currency->symbol }}
                                                                -{{ $currency->code }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Job Per
                                                        <span class="text-danger">*</span></label>
                                                    <select name="per_id" class="form-control" id="exampleSelectd">
                                                        @foreach ($pers as $per)
                                                            <option {{ $per->id == $job->per_id ? 'selected' : '' }}
                                                                value="{{ $per->id }}">{{ $per->per }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Job Salary
                                                        <span class="text-danger">*</span></label>
                                                    <input required value="{{ $job->salary }}" type="text"
                                                        name="salary" class="form-control"
                                                        placeholder="Enter job salary" />
                                                </div>

                                                <div class="form-group">
                                                    <label>Job Email
                                                        <span class="text-danger">*</span></label>
                                                    <input required value="{{ $job->job_post_email }}" type="text"
                                                        name="job_post_email" class="form-control"
                                                        placeholder="Enter post email" />
                                                </div>


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
                            <!-- Modal-->
                            <div class="modal fade" id="exampleModalDelete{{ $job->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{ route('admin.categories.destroy', $job->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Are You sure to delete category? <span
                                                            class="text-danger">*</span></label>
                                                    <input readonly value="{{ $job->name }}" type="text"
                                                        name="name" class="form-control"
                                                        placeholder="Enter category name" />
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-primary font-weight-bold"
                                                    data-dismiss="modal">Close
                                                </button>
                                                <button type="submit" class="btn btn-danger font-weight-bold">Save
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
    </div>
    </body>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            // document.title = 'Categories';
            $('#tableToExcel').DataTable({
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: ""
                },
                pagingType: 'numbers',
                // "dom": '<"dt-buttons"Bf><"clear">lirtp',
                // dom: 'Bfrtip',
                buttons: [
                    'excel'
                ],
                "paging": true,
                "autoWidth": true,
            });
        });
    </script>
    <script>
        $(function() {
            // $('.toggle-class-sad').change(function () {
            $(document).on("click", ".toggle-class-sad", function() {
                var shown = $(this).prop('checked') == true ? 1 : 0;
                var post_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/changePostStatusTest',
                    data: {
                        'shown': shown,
                        'id': post_id
                    },
                    success: function(data) {
                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.info(data.success);
                        console.log(data.success)
                    }
                });
            })
        })
    </script>
    <script>
        function HtmlTOExcel() {
            // const table = document.getElementById('tableToExcel');
            // const html = table.outerHTML;
            // // window.open('data:application/vnd.ms-excel;base64,' + btoa(html));
            // window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));

            var tab_text = "<table border='2px'><tr bgcolor='#87AFC6'>";
            var textRange;
            var j = 0;
            tab = document.getElementById('tableToExcel'); // id of table

            for (j = 0; j < tab.rows.length; j++) {
                tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
                //tab_text=tab_text+"</tr>";
            }

            tab_text = tab_text + "</table>";
            tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
            tab_text = tab_text.replace(/<img[^>]*>/gi, ""); // remove if u want images in your table
            tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

            var ua = window.navigator.userAgent;
            var msie = ua.indexOf("MSIE ");

            if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) // If Internet Explorer
            {
                txtArea1.document.open("txt/html", "replace");
                txtArea1.document.write(tab_text);
                txtArea1.document.close();
                txtArea1.focus();
                sa = txtArea1.document.execCommand("SaveAs", true, "Say Thanks to Sumit.xls");
            } else //other browser not tested on IE 11
                sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));

            return (sa);
        }
    </script>
    @include('editor2')
    @include('editor')
@endsection
