@extends('AdminDashboard.index')

@section('title','Admin Home')
@section('breadcrumb')
    <a  class="btn">Admin DashBoard - {{auth('admins')->user()->name}}</a>
@endsection
@section('content')
    <div class="row">
        <div class="col-2 card-title form-group">
            <select class="form-control" name="changeChart" id="test">
                <option value="365">This year</option>
                <option value="7">last 7 days</option>
                <option value="30">last 30 days</option>
            </select>
        </div>
        <div class="col-12">
            <!--begin::Charts Widget 2-->
            <div class="card card-custom bg-gray-100 card-stretch gutter-b" id="div1">
                <!--begin::Header-->
                <div class="card-header h-auto border-0">
                    <!--begin::Title-->
                    <div class="card-title">
                        <h3 class="card-label">
                            <span class="d-block text-dark font-weight-bolder">Sales This Year</span>
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
            <div style="display: none" class="card card-custom bg-gray-100 card-stretch gutter-b" id="div2">
                <!--begin::Header-->
                <div class="card-header h-auto border-0">
                    <!--begin::Title-->
                    <div class="card-title">
                        <h3 class="card-label">
                            <span class="d-block text-dark font-weight-bolder">Sales Last 30 days</span>
                        </h3>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Chart-->
                    <div id="kt_charts_widget_2_chart_tab_2"></div>
                    <!--end::Chart-->
                </div>
                <!--end::Body-->
            </div>
            <div style="display: none" class="card card-custom bg-gray-100 card-stretch gutter-b" id="div3">
                <!--begin::Header-->
                <div class="card-header h-auto border-0">
                    <!--begin::Title-->
                    <div class="card-title">
                        <h3 class="card-label">
                            <span class="d-block text-dark font-weight-bolder">Sales for last 7 days</span>
                        </h3>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Chart-->
                    <div id="kt_charts_widget_2_chart_tab_3"></div>
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
                        <a class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary">{{$companies}} companies</a>
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
                        <a class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary">{{$seekers}} Job Seekers</a>
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
                        <a class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary">{{$jobs}} Posted jobs</a>
                        <span class="font-weight-bold text-muted font-size-lg"></span>
                    </div>
                    <img src="{{asset('assets/media/svg/avatars/004-boy-1.svg')}}" alt=""
                         class="align-self-end h-100px"/>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Stats Widget 6-->
        </div>
        <div class="col-md-4 col-sm-4">
            <!--begin::Stats Widget 6-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body d-flex align-items-center py-0 mt-8">
                    <div class="d-flex flex-column flex-grow-1 py-2 py-lg-5">
                        <a class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary">{{$jobs}} Sales</a>
                        <span class="font-weight-bold text-muted font-size-lg"></span>
                    </div>
                    <img src="{{asset('assets/media/svg/illustrations/login-visual-1.svg')}}" alt=""
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
        $('#test').on('change', function() {
            //  alert( this.value ); // or $(this).val()
            if(this.value == 365) {
                $('#div1').show();
                $('#div2').hide();
                $('#div3').hide();
            }
            if(this.value == 30) {
                $('#div1').hide();
                $('#div2').show();
                $('#div3').hide();
            }
            if(this.value == 7) {
                $('#div1').hide();
                $('#div2').hide();
                $('#div3').show();
            }
        });
    </script>
    <script>
        var data = {!! json_encode($data_job) !!};
        var data_job_30 = {!! json_encode($data_job_30) !!};
        var data_job_7 = {!! json_encode($data_job_7) !!};
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
                            name: 'Sales',
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
                                return  val
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

            var _initChartsWidget2 = function () {
                var element = document.getElementById("kt_charts_widget_2_chart_tab_2");

                if (!element) {
                    return;
                }

                var options = {
                    series: [
                        {
                            name: 'Sales',
                            data: data_job_30
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
                        categories: {!! json_encode($keys) !!},
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
                                return  val
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

            var _initChartsWidget3 = function () {
                var element = document.getElementById("kt_charts_widget_2_chart_tab_3");

                if (!element) {
                    return;
                }

                var options = {
                    series: [
                        {
                            name: 'Sales',
                            data: data_job_7
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
                        categories: {!! json_encode($keysWeek) !!},
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
                                return  val
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
                    _initChartsWidget2();
                    _initChartsWidget3();
                }
            }
        }();
    </script>
@endsection