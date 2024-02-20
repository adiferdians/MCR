@extends('admin.layout.master')
@section('content')
@section('Dashboard', 'active')
@section('title', 'Dashboard')


<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h2>Certificate</h2>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center card-dashboard">
                                    <h5 class="mb-0">Active</h5>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">{{$countCertificateActive}} Pcs</p>
                                </div>
                                <div class="d-flex d-sm-block d-md-flex align-items-center card-dashboard">
                                    <h5 class="mb-0">Withdrawed</h5>
                                    <p class="text-warning ml-2 mb-0 font-weight-medium">{{$countCertificateWithdraw}} Pcs</p>
                                </div>
                                <div class="d-flex d-sm-block d-md-flex align-items-center card-dashboard">
                                    <h5 class="mb-0">Suspended</h5>
                                    <p class="text-danger ml-2 mb-0 font-weight-medium">{{$countCertificateSuspended}} Pcs</p>
                                </div>
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h2>Client Certification</h2>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center card-dashboard">
                                    <h5 class="mb-0">Active</h5>
                                </div>
                                <div class="d-flex d-sm-block d-md-flex align-items-center card-dashboard">
                                    <h5 class="mb-0">Withdrawed</h5>
                                </div>
                                <div class="d-flex d-sm-block d-md-flex align-items-center card-dashboard">
                                    <h5 class="mb-0">Suspended</h5>
                                </div>
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h2>Client Consultation</h2>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-flex d-sm-block d-md-flex align-items-center card-dashboard">
                                    <h5 class="mb-0">Done</h5>
                                    <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                                </div>
                                <div class="d-flex d-sm-block d-md-flex align-items-center card-dashboard">
                                    <h5 class="mb-0">On Progress</h5>
                                    <p class="text-primary ml-2 mb-0 font-weight-medium"></p>
                                </div>
                                <div class="d-flex d-sm-block d-md-flex align-items-center card-dashboard">
                                    <h5 class="mb-0">Pending</h5>
                                    <p class="text-warning ml-2 mb-0 font-weight-medium"></p>
                                </div>
                                <div class="d-flex d-sm-block d-md-flex align-items-center card-dashboard">
                                    <h5 class="mb-0">Overdue</h5>
                                    <p class="text-danger ml-2 mb-0 font-weight-medium"></p>
                                </div>
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©mcrcert.com 2024</span>
        </div>
    </footer>
    <!-- partial -->
</div>
<!-- main-panel ends -->

@endsection