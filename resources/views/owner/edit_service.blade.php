@extends('owner.dashboard_header')
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
                                <h1 class="text-center">Edit service</h1>
                            </div>
                            <hr>
                            <div class="col-lg-12 mb-4 order-0">
                                <form action="{{ route('update_ser',$service->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="id" class="form-label">Service id*</label>
                                        <input type="text" name="service_id" value="{{ $service->service_id }}"
                                            class="form-control" id="id">
                                        <div>
                                            @error('service_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Service name*</label>
                                        <input type="text" name="service_name" value="{{ $service->service_name }}"
                                            class="form-control" id="name">
                                        <div>
                                            @error('service_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="charge" class="form-label">Service charge*</label>
                                        <input type="number" name="service_charge" value="{{ $service->service_charge }}"
                                            class="form-control" id="charge">
                                        <div>
                                            @error('service_charge')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="days" class="form-label">minimum days taken to finish
                                            service*</label>
                                        <input type="number" name="days" value="{{ $service->min_days_finish }}"
                                            class="form-control" id="days">
                                        <div>
                                            @error('days')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Update</button><br><br>

                                        <a href="{{ route('post.service') }}" class="btn btn-danger">Back</a>

                                    </div>
                                </form>
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
