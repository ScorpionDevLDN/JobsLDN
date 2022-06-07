@extends('AdminDashboard.index')

@section('title','Category')
@section('content')
    <div class="container">

        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h3 class="card-label">Categories
                        <div class="text-muted pt-2 font-size-sm"></div>
                    </h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->

                    <!-- Button trigger modal-->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add new
                    </button>

                    <!-- Modal-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="{{route('admin.categories.store')}}" method="post">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Categoty</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Category Name
                                                <span class="text-danger">*</span></label>
                                            <input required type="text" name="name" class="form-control"
                                                   placeholder="Enter category name"/>
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
                <!--begin: Datatable-->

                @if($categories->count()>0)
                    <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{$category->id}}</th>
                                <td>{{$category->name}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-1">
                                            <a href="#" class="btn font-weight-bold mr-2 btn-icon btn-succes"
                                               data-toggle="modal"
                                               data-target="#exampleModalEdit">
                                                <i class="far fa-edit "></i>
                                            </a>
                                        </div>
                                        <div class="col-1">
                                            <a href="#" class="btn btn-icon font-weight-bold mr-2" data-toggle="modal"
                                               data-target="#exampleModalDelete">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </div>
                                        <div class="col-3">
                                            <form action="{{route('admin.update_category_status',$category->id)}}"
                                                  method="post" id="statusForm{{$category->id}}">
                                                @csrf
                                                <input name="id" type="hidden" value="{{$category->id}}">
                                                <span class="switch switch-outline switch-icon switch-brand">
																<label>
                                                                    <input {{isset($category['status']) && $category['status'] == '1' ? 'checked' : ''}}
                                                                           value="1" type="checkbox" name="status"
                                                                           onchange="document.getElementById('statusForm{{$category->id}}').submit()">
																	<span></span>
																</label>
															</span>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal-->
                            <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('admin.categories.update',$category->id)}}" method="post">
                                        @method('put')
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Category Name
                                                        <span class="text-danger">*</span></label>
                                                    <input required value="{{$category->name}}" type="text" name="name"
                                                           class="form-control"
                                                           placeholder="Enter category name"/>
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
                            <div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('admin.categories.destroy',$category->id)}}" method="post">
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
                                                    <input readonly value="{{$category->name}}" type="text" name="name"
                                                           class="form-control"
                                                           placeholder="Enter category name"/>
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
                    {{--                    {{ $categories->links() }}--}}
                @else
                    <div class='alert alert-info'><b>نأسف</b> !لا توجد نتائج</div>
                @endif

            </div>
        </div>
        <!--end::Card-->
    </div>
@endsection