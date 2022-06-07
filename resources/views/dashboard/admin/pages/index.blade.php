@extends('AdminDashboard.index')
@section('title','Pages')
@section('content')
    <div class="container">

        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h3 class="card-label">Pages
                        <div class="text-muted pt-2 font-size-sm"></div>
                    </h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->

                    <!-- Button trigger modal-->
                    <a type="button" class="btn btn-primary" href="{{route('admin.pages.create')}}">
                        Add new
                    </a>

                    <!-- Modal-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="{{route('admin.pages.store')}}" method="post">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Page</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Page Title
                                                <span class="text-danger">*</span></label>
                                            <input required type="text" name="title" class="form-control"
                                                   placeholder="Enter category name"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Page description
                                                <span class="text-danger">*</span></label>
                                            <input required type="text" name="description" class="form-control"
                                                   placeholder="Enter description name"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Page content
                                                <span class="text-danger">*</span></label>
                                            <input required type="text" name="content" class="form-control"
                                                   placeholder="Enter content name"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Page slug
                                                <span class="text-danger">*</span></label>
                                            <input required type="text" name="slug" class="form-control"
                                                   placeholder="Enter slug name"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Page metadata
                                                <span class="text-danger">*</span></label>
                                            <input required type="text" name="metadata" class="form-control"
                                                   placeholder="Enter metadata name"/>
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
                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pages as $page)
                        <tr>
                            <th scope="row">{{$page->id}}</th>
                            <td>{{$page->title}}</td>
                            <td>{{$page->content}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-2">
                                        <a href="{{route('admin.pages.edit',$page->id)}}" class="btn font-weight-bold mr-2 btn-icon btn-succes" >
                                            <i class="far fa-edit "></i>
                                        </a>
                                    </div>
                                    <div class="col-2">
                                        <a href="#" class="btn btn-icon font-weight-bold mr-2" data-toggle="modal"
                                           data-target="#exampleModalDelete">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        <form action="{{route('admin.update_page_status',$page->id)}}"
                                              method="post" id="statusForm{{$page->id}}">
                                            @csrf
                                            <input name="id" type="hidden" value="{{$page->id}}">
                                            <span class="switch switch-outline switch-icon switch-brand">
																<label>
                                                                    <input {{isset($page['status']) && $page['status'] == '1' ? 'checked' : ''}}
                                                                           value="1" type="checkbox" name="status"
                                                                           onchange="document.getElementById('statusForm{{$page->id}}').submit()">
																	<span></span>
																</label>
															</span>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal-->
                        <div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="{{route('admin.pages.destroy',$page->id)}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Page</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Are You sure to delete this page? <span
                                                            class="text-danger">*</span></label>
                                                <input readonly value="{{$page->title}}" type="text" name="title"
                                                       class="form-control"
                                                       placeholder="Enter page name"/>
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
        <!--end::Card-->
    </div>
@endsection
