@extends('AdminDashboard.index')
@section('breadcrumb')
    <a href="#" class="btn">Jobs</a>
    <a href="#" class="btn">Payment</a>
@endsection
@section('title','Payment')
@section('content')
    <div class="container">
        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h3 class="card-label">Payment
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
													<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                         viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"/>
															<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                                                  fill="#000000" opacity="0.3"/>
															<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                                                  fill="#000000"/>
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
                    <!--end::Dropdown-->
                    <!--begin::Button-->


                    <!-- Modal-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="{{route('admin.categories.store')}}" method="post">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Category Name
                                                <span class="text-danger">*</span></label>
                                            <input required type="text" name="name" class="form-control"
                                                   placeholder="Enter Category name"/>
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
                <div class="card mb-3">
                    <div class="card-body p-0">
                        <div class="row no-gutters">
                            <br>
                            <div class="col-12 p-3">
                                <div class="row justify-content-center justify-content-sm-between">
                                    <div class="col-sm-auto text-center">
                                        <h5 class="d-inline-block">Subscription Plans</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 border-top">
                                <div style="height: 200px">
                                    <div class="text-center p-4">
                                        <h3 class="font-weight-normal mt-5">Monthly</h3>
                                        <p class="mt-3">Some promotional text comes here...</p>
                                        <h2 class="font-weight-medium my-4"> <sup class="font-weight-normal fs-2 mr-1">$</sup>20<small class="fs--1 text-700">/ Month</small></h2>
                                        <a class="btn btn-outline-primary" href="#">Subscribe</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 border-top">
                                <div class="h-100" style="background-color: rgba(115, 255, 236, 0.18)">
                                    <div class="text-center p-4">
                                        <h3 class="font-weight-normal mt-5">Annual</h3>
                                        <p class="mt-3">Some promotional text comes here...</p>
                                        <h2 class="font-weight-medium my-4"><sup class="font-weight-normal fs-2 mr-1">$</sup>160<small class="fs--1 text-700">/ Year</small></h2>
                                        <a class="btn btn-primary" href="#">Subscribe</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Payment Setting</h5>
                    </div>
                    <div class="card-body">
                        <h5>Plan</h5>
                        <p class="fs-0"><strong>Developer</strong>- Unlimited private repositories</p><a class="btn btn-outline-primary btn-md" href="#!">Update Plan</a>
                    </div>
                    <div class="card-body border-top">
                        <h5>Payment</h5>
                        <p class="fs-0">You have not added any payment.</p><a class="btn btn-outline-primary btn-md" href="#!">Add Payment </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
