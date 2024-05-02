@extends('owner.dashboard_header')

@section('title', 'view booked services')

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
                            <h1 class="text-center">View Booked Services </h1>
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
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($view_booked_services as $view_booked_service)
                                            <tr class="text-center">
                                                <td>{{ $view_booked_service->customer->name }}</td>
                                                <th scope="row">{{ $view_booked_service->service_id }}</th>
                                                <td>{{ $view_booked_service->service_name }}</td>
                                                <td>{{ $view_booked_service->service_charge }} ₹</td>
                                                <td>{{ $view_booked_service->min_days_finish }}-days</td>
                                                <td>{{ date('d/m/Y', strtotime($view_booked_service->updated_at)) }}</td>
                                                <td><a
                                                        href="{{ route('view.each.service', encrypt($view_booked_service->id)) }}"><img src="{{asset('assets/img/view_icon.png')}}" alt="view" width="30px"></a>
                                                </td>
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
