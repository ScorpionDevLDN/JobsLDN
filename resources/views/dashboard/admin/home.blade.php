@extends('AdminDashboard.index')

@section('title','Admin Home')
@section('content')
    <div class="row">
        <div class="col-xl-4">
            <!--begin::Stats Widget 4-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body d-flex align-items-center py-0 mt-8">
                    <div class="d-flex flex-column flex-grow-1 py-2 py-lg-5">
                        <a href="#"
                           class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary">Companies</a>
                        <span class="font-weight-bold text-muted font-size-lg">{{$companies}} total companies</span>
                    </div>
                    <img src="{{asset('assets/media/svg/avatars/029-boy-11.svg')}}" alt=""
                         class="align-self-end h-100px"/>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Stats Widget 4-->
        </div>
        <div class="col-xl-4">
            <!--begin::Stats Widget 5-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body d-flex align-items-center py-0 mt-8">
                    <div class="d-flex flex-column flex-grow-1 py-2 py-lg-5">
                        <a href="#"
                           class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary">Job
                            Seekers</a>
                        <span class="font-weight-bold text-muted font-size-lg">{{$seekers}} total Job Seekers</span>
                    </div>
                    <img src="{{asset('assets/media/svg/avatars/014-girl-7.svg')}}" alt=""
                         class="align-self-end h-100px"/>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Stats Widget 5-->
        </div>
        <div class="col-xl-4">
            <!--begin::Stats Widget 6-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body d-flex align-items-center py-0 mt-8">
                    <div class="d-flex flex-column flex-grow-1 py-2 py-lg-5">
                        <a href="#"
                           class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary">Jobs</a>
                        <span class="font-weight-bold text-muted font-size-lg">{{$jobs}} total jobs</span>
                    </div>
                    <img src="{{asset('assets/media/svg/avatars/004-boy-1.svg')}}" alt=""
                         class="align-self-end h-100px"/>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Stats Widget 6-->
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="row">
                <div class="col-xl-6">
                    <!--begin::Tiles Widget 4-->
                    <div class="card card-custom gutter-b" style="height: 130px">
                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column">
                            <!--begin::Stats-->
                            <div class="flex-grow-1">
                                <div class="text-dark-50 font-weight-bold">Last Published Job</div>
                                <div class="font-weight-bolder font-size-h3">4,9M</div>
                            </div>
                            <!--end::Stats-->
                            <!--begin::Progress-->
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 75%;"
                                     aria-valuenow="75"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <!--end::Progress-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Tiles Widget 4-->
                </div>
                <div class="col-xl-6">
                    <!--begin::Tiles Widget 4-->
                    <div class="card card-custom gutter-b" style="height: 130px">
                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column">
                            <!--begin::Stats-->
                            <div class="flex-grow-1">
                                <div class="text-dark-50 font-weight-bold">Total Sales</div>
                                <div class="font-weight-bolder font-size-h3">4,9M</div>
                            </div>
                            <!--end::Stats-->
                            <!--begin::Progress-->
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 75%;"
                                     aria-valuenow="75"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <!--end::Progress-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Tiles Widget 4-->
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row"><h5>Shortcut</h5></div>
                            <hr>
                            <div class="row justify-content-between mb-10 text-center">
                                <div class="col-4 pb-10">
                                    <a href="{{route('admin.home')}}">
                                        <i class="fas fa-home text-dark icon-3x"></i>
                                        <h6 class="text-dark">Home</h6>
                                    </a>
                                </div>
                                <div class="col-4 pb-10">
                                    <a href="{{route('admin.home')}}">
                                        <i class="fas fa-wrench text-dark icon-3x"></i>
                                        <h6 class="text-dark"><span>Setting</span></h6>
                                    </a>
                                </div>
                                <div class="col-4 pb-10">
                                    <a href="{{route('admin.home')}}">
                                        <i class="far fa-bell text-dark icon-3x"></i>
                                        <h6 class="text-dark">Notification</h6>
                                    </a>
                                </div>
                                <div class="col-4 pb-10">
                                    <a href="{{route('admin.home')}}">
                                        <i class="fas fa-user-edit text-dark icon-3x"></i>
                                        <h6 class="text-dark">Edit Profile</h6>
                                    </a>
                                </div>
                                <div class="col-4 pb-10">
                                    <a href="{{route('admin.home')}}">
                                        <i class="flaticon-network text-dark icon-3x"></i>
                                        <h6 class="text-dark">Jobs</h6>
                                    </a>
                                </div>
                                <div class="col-4 pb-10">
                                    <a href="{{route('admin.home')}}">
                                        <i class="flaticon2-group text-dark icon-3x"></i>
                                        <h6 class="text-dark">Company</h6>
                                    </a>
                                </div>
                                <div class="col-4 pb-5">
                                    <a href="{{route('admin.home')}}">
                                        <i class="flaticon-businesswoman text-dark icon-3x"></i>
                                        <h6 class="text-dark">Job Seekers</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{--chart--}}
        <div class="col-8">
            <!--begin::Charts Widget 2-->
            <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header h-auto border-0">
                    <!--begin::Title-->
                    <div class="card-title py-5">
                        <h3 class="card-label">
                            <span class="d-block text-dark font-weight-bolder">Total Earning</span>
{{--                            <span class="d-block text-dark-50 mt-2 font-size-sm">Month</span>--}}
                        </h3>
                    </div>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
{{--                                    <div class="card-toolbar">--}}
{{--                                        <ul class="nav nav-pills nav-pills-sm nav-dark-75" role="tablist">--}}
{{--                                            <li class="nav-item">--}}
{{--                                                <a id="myBtn" class="nav-link py-2 px-4" data-toggle="tab" href="#kt_charts_widget_2_chart_tab_1">--}}
{{--                                                    <span class="nav-text font-size-sm">Month</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li class="nav-item">--}}
{{--                                                <a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_charts_widget_2_chart_tab_2">--}}
{{--                                                    <span class="nav-text font-size-sm">Week</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li class="nav-item">--}}
{{--                                                <a class="nav-link py-2 px-4 active" data-toggle="tab"--}}
{{--                                                   href="#kt_charts_widget_2_chart_tab_3">--}}
{{--                                                    <span class="nav-text font-size-sm">Day</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
                <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Chart-->
                    <div id="kt_charts_widget_2_chart_tab_1"></div>
                    <!--end::Chart-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Charts Widget 2-->
        </div>
    </div>
@endsection

@section('js')
    <script>
        var data = {!! json_encode($data_job) !!};
        // console.log(tmp);
        var KTWidgets = function () {
            var _initChartsWidget1 = function () {
                var element = document.getElementById("kt_charts_widget_2_chart_tab_1");

                if (!element) {
                    return;
                }

                var options = {
                    series: [
                        {
                            name: 'Net Profit',
                            data: data
                        },
                        // {
                        //     name: 'Revenue',
                        //     data: [76, 85, 101, 98, 87, 105, 10]
                        // }
                        ],
                    chart: {
                        type: 'bar',
                        height: 350,
                        toolbar: {
                            show: false
                        }
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: ['30%'],
                            endingShape: 'rounded'
                        },
                    },
                    legend: {
                        show: false
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false
                        },
                        labels: {
                            style: {
                                colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                                fontSize: '12px',
                                fontFamily: KTApp.getSettings()['font-family']
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            style: {
                                colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                                fontSize: '12px',
                                fontFamily: KTApp.getSettings()['font-family']
                            }
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    states: {
                        normal: {
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        },
                        hover: {
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        },
                        active: {
                            allowMultipleDataPointsSelection: false,
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        }
                    },
                    tooltip: {
                        style: {
                            fontSize: '12px',
                            fontFamily: KTApp.getSettings()['font-family']
                        },
                        y: {
                            formatter: function (val) {
                                return "$" + val + " thousands"
                            }
                        }
                    },
                    colors: [KTApp.getSettings()['colors']['theme']['base']['primary'], KTApp.getSettings()['colors']['gray']['gray-300']],
                    grid: {
                        borderColor: KTApp.getSettings()['colors']['gray']['gray-200'],
                        strokeDashArray: 4,
                        yaxis: {
                            lines: {
                                show: true
                            }
                        }
                    }
                };

                var chart = new ApexCharts(element, options);
                chart.render();
            }

            // Public methods
            return {
                init: function () {
                    _initChartsWidget1();
                }
            }
        }();
    </script>
@endsection