@extends('owner.dashboard_header')

@section('title', 'View each booking service')

@section('content')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!--left sidebar Menu -->
            @include('owner.left_sidebar')
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                @include('owner.nav')

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="text-center">View Details</h1>
                            </div>
                            <hr>
                            <div class="col-lg-12 mb-4 order-0">
                                {{-- <form action="#" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Customer Name</label>
                                        <input type="text" value="{{$each_services_booked->customer->name}}" name="customer_name" class="form-control" id="name" readonly>

                                    </div>
                                    <div class="mb-3">
                                        <label for="id" class="form-label">Service id*</label>
                                        <input type="text" value="{{$each_services_booked->service_id}}" name="service_id" class="form-control" id="id" readonly>

                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Service name*</label>
                                        <input type="text" value="{{$each_services_booked->service_name}}" name="service_name" class="form-control" id="name" readonly>

                                    </div>
                                    <div class="mb-3">
                                        <label for="charge" class="form-label">Service charge*</label>
                                        <input type="number" value="{{$each_services_booked->service_charge}}" name="service_charge" class="form-control" id="charge" readonly>

                                    </div>
                                    <div class="mb-3">
                                        <label for="days" class="form-label">minimum days taken to finish
                                            service*</label>
                                        <input type="number" value="{{$each_services_booked->min_days_finish}}" name="days" class="form-control" id="days" readonly>

                                    </div>

                                </form> --}}
                                <div class="text-center bg-info col-sm-12">
                                    <br>
                                    <h3>Customer Name - {{ $each_services_booked->customer->name }}</h3>
                                    <br>
                                    <h3>Services Id - {{ $each_services_booked->service_id }}</h3>
                                    <br>
                                    <h3>Service Name - {{ $each_services_booked->service_name }}</h3>
                                    <br>
                                    <h3>Service Charge - {{ $each_services_booked->service_charge }} ₹</h3>
                                    <br>
                                    <h3>Minimum days to finish - {{ $each_services_booked->min_days_finish }} days</h3>
                                    <br>
                                    <h3>Booked date - {{ date('d/m/Y', strtotime($each_services_booked->updated_at)) }}</h3>
                                    <br>

                                </div>
                                <br>
                                <div class="text-center">
                                    <a href="{{ route('view.booked.services') }}" class="btn btn-danger">Back</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 order-1">
                                <div class="row">

                                </div>
                            </div>

                            <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">

                            </div>
                        </div>
                        <div class="row">

                        </div>
                    </div>
                    <!-- / Content -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
@endsection
