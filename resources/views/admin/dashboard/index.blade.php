@extends('admin.layouts.app')
@section('title', 'Academics Admin | Dashboard')

@section('content')

<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Dashboard</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::App Content Header-->
<!--begin::App Content-->
<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <!--begin::Col-->
            <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 1-->
                <div class="small-box text-bg-primary">
                    <div class="inner">
                        <h3>33</h3>
                        <p>New Order(s)</p>
                    </div>
                    <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path
                            d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z">
                        </path>
                    </svg>
                    <a href="#"
                        class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        More info <i class="bi bi-link-45deg"></i>
                    </a>
                </div>
                <!--end::Small Box Widget 1-->
            </div>
            <!--end::Col-->
            <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 2-->
                <div class="small-box text-bg-success">
                    <div class="inner">
                        <h3>{{ $newCourses }}</h3>
                        <p>Course(s)</p>
                    </div>
                    <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path
                            d="M12 2L1 7l11 5 9-4.09V17h2V7L12 2zM4.21 10.47L3 11.03v2.19c0 2.5 3.33 4.3 9 4.77 5.67-.47 9-2.27 9-4.77v-2.19l-1.21-.56c-.9.62-2.34 1.19-4.08 1.63-1.36.33-2.89.51-4.71.51s-3.35-.18-4.71-.51c-1.74-.44-3.18-1.01-4.08-1.63z" />
                    </svg>
                    <a href="{{ route('admin.courses') }}"
                        class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        More info <i class="bi bi-link-45deg"></i>
                    </a>
                </div>
                <!--end::Small Box Widget 2-->
            </div>
            <!--end::Col-->
            <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 3-->
                <div class="small-box text-bg-warning">
                    <div class="inner">
                        <h3>{{ $userCount }}</h3>
                        <p>User Registration(s)</p>
                    </div>
                    <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path
                            d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                        </path>
                    </svg>
                    <a href="{{ route('admin.users') }}"
                        class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                        More info <i class="bi bi-link-45deg"></i>
                    </a>
                </div>
                <!--end::Small Box Widget 3-->
            </div>
            <!--end::Col-->
            <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 4-->
                <div class="small-box text-bg-danger">
                    <div class="inner">
                        <h3>{{ $newTeachers }}</h3>
                        <p>Teacher(s)</p>
                    </div>
                    <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path
                            d="M12 12c2.21 0 4-1.79 4-4S14.21 4 12 4s-4 1.79-4 4 1.79 4 4 4Zm6 2h-2.18A3.001 3.001 0 0 1 12 13a3.001 3.001 0 0 1-3.82 1H6c-1.1 0-2 .9-2 2v3a1 1 0 1 0 2 0v-2h12v2a1 1 0 1 0 2 0v-3c0-1.1-.9-2-2-2Z" />
                    </svg>
                    <a href="{{ route('admin.teachers') }}"
                        class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        More info <i class="bi bi-link-45deg"></i>
                    </a>
                </div>


                <!--end::Small Box Widget 4-->
            </div>
            <!--end::Col-->
        </div>
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12 connectedSortable">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Sales Value</h3>
                    </div>
                    <div class="card-body">
                        <div id="revenue-chart"></div>
                    </div>
                </div>
                <!-- /.card -->
                <!-- DIRECT CHAT -->
                <!-- /.direct-chat -->
            </div>
            <!-- /.Start col -->
            <!-- Start col -->
            <!-- /.Start col -->
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end::App Content-->

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    const chartData = @json($chartData);

    const sales_chart_options = {
        series: chartData.series,
        chart: {
            height: 300,
            type: 'area',
            toolbar: {
                show: true,
            },
        },
        legend: {
            show: true,
            position: 'top',
        },
        colors: ['#0d6efd', '#20c997', '#ffc107', '#dc3545'],
        dataLabels: {
            enabled: false,
        },
        stroke: {
            curve: 'smooth',
            width: 2,
        },
        xaxis: {
            type: 'datetime',
            categories: chartData.categories,
            labels: {
                format: 'MMM yyyy',
            },
        },
        tooltip: {
            x: {
                format: 'MMMM yyyy',
            },
        },
        grid: {
            borderColor: '#e7e7e7',
            row: {
                colors: ['#f3f3f3', 'transparent'],
                opacity: 0.5,
            },
        },
    };

    const sales_chart = new ApexCharts(
        document.querySelector('#revenue-chart'),
        sales_chart_options
    );
    sales_chart.render();
</script>

@endsection