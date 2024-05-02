@extends('customer.customer_dashboard_header')

@section('title', 'services booked history')

@section('content')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!--left sidebar Menu -->
            @include('customer.left_sidebar')
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('customer.nav')
                <!-- / Navbar -->
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <h1 class="text-center">Services Booked History</h1>
                            <hr>
                            <div class="col-lg-12 mb-4 order-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="table-primary text-center">
                                            <th scope="col">Service ID</th>
                                            <th scope="col">Service Name</th>
                                            <th scope="col">Service Charge</th>
                                            <th scope="col">Minimum days taken to finish service</th>
                                            <th scope="col">Booked date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($booked_services as $booked_service)
                                            <tr class="text-center">
                                                <th scope="row">{{ $booked_service->service_id }}</th>
                                                <td>{{ $booked_service->service_name }}</td>
                                                <td>{{ $booked_service->service_charge }} ₹</td>
                                                <td>{{ $booked_service->min_days_finish }}-days</td>
                                                <td>{{ date('d/m/Y', strtotime($booked_service->updated_at)) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- <div>
                                    {{ $services->links() }}
                                </div> --}}
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
