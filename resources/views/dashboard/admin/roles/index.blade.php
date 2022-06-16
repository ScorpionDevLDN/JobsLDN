@extends('AdminDashboard.index')
@section('breadcrumb')
    <a href="#" class="btn">Roles</a>
@endsection
@section('title','Roles')
@section('content')
    <div class="container">
        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h3 class="card-label">Roles
                        <div class="text-muted pt-2 font-size-sm"></div>
                    </h3>
                </div>
                <div class="card-toolbar">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add new
                    </button>

                    <!-- Modal-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="{{route('admin.roles.store')}}" method="post">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Role Name
                                                <span class="text-danger">*</span></label>
                                            <input required type="text" name="name" class="form-control"
                                                   placeholder="Enter Role name"/>
                                        </div>
                                        <div class="form-group">
                                            <strong>Permission:</strong>
                                            <br/>
                                            @foreach($permissions as $value)
                                                @if($value->id == 1)
                                                    <label><input style="margin: 5px" name="permission[]" value="{{$value->id}}" type="checkbox">Manage Categories</label>
                                                    <br/>
                                                @elseif($value->id == 2)
                                                    <label><input style="margin: 5px" name="permission[]" value="{{$value->id}}" type="checkbox">Manage Cities</label>
                                                    <br/>
                                                @elseif($value->id == 3)
                                                    <label><input style="margin: 5px" name="permission[]" value="{{$value->id}}" type="checkbox">Manage Pers</label>
                                                    <br/>
                                                @elseif($value->id == 4)
                                                    <label><input style="margin: 5px" name="permission[]" value="{{$value->id}}" type="checkbox">Manage Currencies</label>
                                                    <br/>
                                                @elseif($value->id == 5)
                                                    <label><input style="margin: 5px" name="permission[]" value="{{$value->id}}" type="checkbox">Manage Types</label>
                                                    <br/>
                                                @elseif($value->id == 6)
                                                    <label><input style="margin: 5px" name="permission[]" value="{{$value->id}}" type="checkbox">Manage Roles</label>
                                                    <br/>
                                                @elseif($value->id == 7)
                                                    <label><input style="margin: 5px" name="permission[]" value="{{$value->id}}" type="checkbox">Manage Users</label>
                                                    <br/>
                                                @else
                                                    <label><input style="margin: 5px" name="permission[]" value="{{$value->id}}" type="checkbox">{{ $value->name }}</label>
                                                    <br/>
                                                @endif
                                            @endforeach
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
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <table id="tableToExcel" class="table" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">role Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <th scope="row">{{$role->id}}</th>
                            <td>{{$role->name}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-1 pr-10" style="margin-left: -10px;">
                                        <a href="#" class="btn btn-light-primary font-weight-bold btn-icon"
                                           data-toggle="modal"
                                           data-target="#exampleModalEdit{{$role->id}}">
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
                                    <div class="col-1">
                                        <a href="#" class="btn btn-light-danger btn-icon font-weight-bold" data-toggle="modal"
                                           data-target="#exampleModalDelete{{$role->id}}">
                                            <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Trash.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z"
                                                                      fill="#000000" fill-rule="nonzero"/>
                                                                <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                      fill="#000000" opacity="0.3"/>
                                                            </g>
                                                        </svg><!--end::Svg Icon--></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- Modal-->
                        <div class="modal fade" id="exampleModalEdit{{$role->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="{{route('admin.roles.update',$role->id)}}" method="post">
                                    @method('put')
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit role</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>role Name
                                                    <span class="text-danger">*</span></label>
                                                <input required value="{{$role->name}}" type="text" name="name"
                                                       class="form-control"
                                                       placeholder="Enter role name"/>
                                            </div>

                                            <div class="form-group">
                                                <strong>Permission:</strong>
                                                <br/>
                                                @foreach($permissions as $value)
                                                    @if($value->id == 1)
                                                        <label><input style="margin: 5px" name="permission[]" value="{{$value->id}}" type="checkbox">Manage Categories</label>
                                                        <br/>
                                                    @elseif($value->id == 2)
                                                        <label><input style="margin: 5px" name="permission[]" value="{{$value->id}}" type="checkbox">Manage Cities</label>
                                                        <br/>
                                                    @elseif($value->id == 3)
                                                        <label><input style="margin: 5px" name="permission[]" value="{{$value->id}}" type="checkbox">Manage Pers</label>
                                                        <br/>
                                                    @elseif($value->id == 4)
                                                        <label><input style="margin: 5px" name="permission[]" value="{{$value->id}}" type="checkbox">Manage Currencies</label>
                                                        <br/>
                                                    @elseif($value->id == 5)
                                                        <label><input style="margin: 5px" name="permission[]" value="{{$value->id}}" type="checkbox">Manage Types</label>
                                                        <br/>
                                                    @elseif($value->id == 6)
                                                        <label><input style="margin: 5px" name="permission[]" value="{{$value->id}}" type="checkbox">Manage Roles</label>
                                                        <br/>
                                                    @elseif($value->id == 7)
                                                        <label><input style="margin: 5px" name="permission[]" value="{{$value->id}}" type="checkbox">Manage Users</label>
                                                        <br/>
                                                    @else
                                                        <label><input style="margin: 5px" name="permission[]" value="{{$value->id}}" type="checkbox">{{ $value->name }}</label>
                                                        <br/>
                                                    @endif
                                                @endforeach
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
                        <div class="modal fade" id="exampleModalDelete{{$role->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="{{route('admin.roles.destroy',$role->id)}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete role</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Are You sure to delete role? <span
                                                            class="text-danger">*</span></label>
                                                <input readonly value="{{$role->name}}" type="text" name="name"
                                                       class="form-control"
                                                       placeholder="Enter role name"/>
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
        $(document).ready(function () {
            $('#tableToExcel').DataTable(
                {
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    responsive: true,
                    language: { search: "" },
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
            $(document).on("click", ".toggle-class", function(){
                var status = $(this).prop('checked') == true ? 1 : 0;
                var role_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/changeStatus',
                    data: {'status': status, 'id': role_id},
                    success: function (data) {
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
            tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
            tab_text = tab_text.replace(/<img[^>]*>/gi, ""); // remove if u want images in your table
            tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

            var ua = window.navigator.userAgent;
            var msie = ua.indexOf("MSIE ");

            if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
            {
                txtArea1.document.open("txt/html", "replace");
                txtArea1.document.write(tab_text);
                txtArea1.document.close();
                txtArea1.focus();
                sa = txtArea1.document.execCommand("SaveAs", true, "Say Thanks to Sumit.xls");
            } else                 //other browser not tested on IE 11
                sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));

            return (sa);
        }
    </script>
@endsection