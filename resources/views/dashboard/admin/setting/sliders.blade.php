@extends('AdminDashboard.index')
@section('breadcrumb')
    <a href="{{route('admin.sliders.index')}}" class="btn">Sliders</a>
@endsection
@section('title','Slider')
@section('content')
    <div class="container">
        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h3 class="card-label">Sliders
                        <div class="text-muted pt-2 font-size-sm"></div>
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <table id="tableToExcel" class="table responsive" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Main text</th>
                        <th scope="col">Description</th>
                        <th scope="col">CTA</th>
                        {{--<th scope="col">Image</th>--}}
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
                                    <div class="col-1 pr-10" style="margin-left: -10px;">
                                        <div class="pretty p-icon p-toggle p-plain btn btn-light-info btn-icon">
                                            <input name="status" data-id="{{$slider->id}}" class="toggle-class"
                                                   type="checkbox" {{ $slider->status ? 'checked' : '' }}>
                                            <div class="state p-success-o p-on">
                                                <i class="fas fa-eye"></i>
                                                {{--<label>Show</label>--}}
                                            </div>
                                            <div class="state p-off ">
                                                <i class="fas fa-eye-slash"></i>

                                                {{-- <label>Hide</label>--}}
                                            </div>
                                        </div>
                                    </div>
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
    </div>
    </body>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            // document.title = 'Categories';
            $('#tableToExcel').DataTable(
                {
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    responsive: true,
                    language: {search: ""},
                    pagingType: 'numbers',
                    // "dom": '<"dt-buttons"Bf><"clear">lirtp',
                    // dom: 'Bfrtip',
                    buttons: [
                        'excel'
                    ],
                    "paging": true,
                    "autoWidth": true,
                }
            );
        });
    </script>
    <script>
        $(function () {
            // $('.toggle-class').change(function () {
            $(document).on("click", ".toggle-class", function () {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var slider_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/changeSliderStatus',
                    data: {'status': status, 'id': slider_id},
                    success: function (data) {
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
@endsection