@extends('owner.dashboard_header')

@section('title', 'Booking status')

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
                            <h1 class="text-center">Booking Status </h1>
                            <hr>
                            <div class="col-lg-12 mb-4 order-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="table-primary text-center">
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Service ID</th>
                                            <th scope="col">Service Name</th>
                                            <th scope="col">Service Charge</th>
                                            <th scope="col">Minimum days taken to finish service</th>
                                            <th scope="col">Booked date</th>
                                            <th scope="col">status</th>
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($booked_statuss as $booked_status)
                                            <tr class="text-center">
                                                <td>{{ $booked_status->customer->name }}</td>
                                                <td>{{ $booked_status->service_id }}</td>
                                                <td>{{ $booked_status->service_name }}</td>
                                                <td>{{ $booked_status->service_charge }} ₹</td>
                                                <td>{{ $booked_status->min_days_finish }}-days</td>
                                                <td>{{ date('d/m/Y', strtotime($booked_status->updated_at)) }}</td>
                                                <td>
                                                    @if ($booked_status->service_status == '2')
                                                        <h3 class="text-info">Booked</h3>
                                                    @elseif ($booked_status->service_status == '3')
                                                        <h3 class="text-danger">pending</h3>
                                                    @elseif ($booked_status->service_status == '4')
                                                        <h3 class="text-primary">Ready for delivery</h3>
                                                    @elseif ($booked_status->service_status == '5')
                                                        <h3 class="text-success">Completed</h3>
                                                    @endif
                                                </td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

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
