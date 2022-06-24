@extends('AdminDashboard.index')

@section('title','Admin Home')
@section('breadcrumb')
    <a  class="btn">Admin DashBoard - {{auth('admins')->user()->name}}</a>
@endsection
@section('content')
    <div class="row">
        {{--chart--}}
        <div class="col-12">
            <!--begin::Charts Widget 2-->
            <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header h-auto border-0">
                    <!--begin::Title-->
                    <div class="card-title">
                        <h3 class="card-label">
                            <span class="d-block text-dark font-weight-bolder">Total Earning</span>
                            {{--                            <span class="d-block text-dark-50 mt-2 font-size-sm">Month</span>--}}
                        </h3>
                    </div>
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

    <div class="row">
        <div class="col-md-4 col-sm-4">
            <!--begin::Stats Widget 4-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body d-flex align-items-center py-0 mt-8">
                    <div class="d-flex flex-column flex-grow-1 py-2 py-lg-5">
                        <a href="#"
                           class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary">{{$companies}} total companies</a>
                        <span class="font-weight-bold text-muted font-size-lg"> </span>
                    </div>
                    <img src="{{asset('assets/media/svg/avatars/029-boy-11.svg')}}" alt=""
                         class="align-self-end h-100px"/>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Stats Widget 4-->
        </div>
        <div class="col-md-4 col-sm-4">
            <!--begin::Stats Widget 5-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body d-flex align-items-center py-0 mt-8">
                    <div class="d-flex flex-column flex-grow-1 py-2 py-lg-5">
                        <a href="#"
                           class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary">{{$seekers}} total Job Seekers</a>
                        <span class="font-weight-bold text-muted font-size-lg"></span>
                    </div>
                    <img src="{{asset('assets/media/svg/avatars/014-girl-7.svg')}}" alt=""
                         class="align-self-end h-100px"/>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Stats Widget 5-->
        </div>
        <div class="col-md-4 col-sm-4">
            <!--begin::Stats Widget 6-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body d-flex align-items-center py-0 mt-8">
                    <div class="d-flex flex-column flex-grow-1 py-2 py-lg-5">
                        <a href="#"
                           class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary">{{$jobs}} total jobs</a>
                        <span class="font-weight-bold text-muted font-size-lg"></span>
                    </div>
                    <img src="{{asset('assets/media/svg/avatars/004-boy-1.svg')}}" alt=""
                         class="align-self-end h-100px"/>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Stats Widget 6-->
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
                            name: 'Jobs Count',
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
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Aug', 'Nov', 'Dec'],
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