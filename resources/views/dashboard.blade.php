@extends('layouts.app')

@section('title', 'dashboard')

@section('content')
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-xl-6 col-md-12">
            <div class="card flat-card">
                <div class="row-table">
                    <div class="col-sm-6 card-body br">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="material-icons-two-tone text-primary mb-1">group</i>
                            </div>
                            <div class="col-sm-8 text-md-center">
                                <h5>1000</h5>
                                <span>Emoloyees</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 d-none d-md-table-cell d-lg-table-cell d-xl-table-cell card-body br">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="material-icons-two-tone text-primary mb-1">attach_money</i>
                            </div>
                            <div class="col-sm-8 text-md-center">
                                <h5>$1252</h5>
                                <span>Paid</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="material-icons-two-tone text-primary mb-1">money_off</i>
                            </div>
                            <div class="col-sm-8 text-md-center">
                                <h5>600</h5>
                                <span>Unpaid</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-table">
                    <div class="col-sm-6 card-body br">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="material-icons-two-tone text-primary mb-1">access_time</i>
                            </div>
                            <div class="col-sm-8 text-md-center">
                                <h5>$3550</h5>
                                <span>Overtime Pay</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 d-none d-md-table-cell d-lg-table-cell d-xl-table-cell card-body br">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="material-icons-two-tone text-primary mb-1">request_page</i>
                            </div>
                            <div class="col-sm-8 text-md-center">
                                <h5>1000</h5>
                                <span>Runs</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="material-icons-two-tone text-primary mb-1">pending_actions</i>
                            </div>
                            <div class="col-sm-8 text-md-center">
                                <h5>10</h5>
                                <span>Pending</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-md-12">
                <div class="card">
                    <div class="card-body" style ="height: 340px;">
                        <h6>Employee Distribution</h6>
                        <span>Employees Working at diffrent departments</span>
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col">
                                <div id="satisfaction-chart" style =""></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Monthly Payroll Reporting</h5>
                </div>
                <div class="card-body">
                    <div class="row pb-2">
                        <div class="col-auto m-b-10">
                            <h3 class="mb-1">$21,356.46</h3>
                            <span>Total Paid</span>
                        </div>
                        <div class="col-auto m-b-10">
                            <h3 class="mb-1">$1935.6</h3>
                            <span>Average</span>
                        </div>
                    </div>
                    <div id="account-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-12">
            <div class="card feed-card" style ="height: 300px;">
                    <div class="card-header">
                        <h5>Feeds</h5>
                    </div>
                    <div class="feed-scroll" style="height:385px;position:relative;">
                        <div class="card-body">
                            <div class="row m-b-25 align-items-center">
                                <div class="col-auto p-r-0">
                                    <i data-feather="bell" class="bg-light-primary feed-icon p-2 wid-30 hei-30"></i>
                                </div>
                                <div class="col">
                                    <a href="#!">
                                        <h6 class="m-b-5">You have 3 pending tasks. <span class="text-muted float-right f-14">Just Now</span></h6>
                                    </a>
                                </div>
                            </div>
                            <div class="row m-b-25 align-items-center">
                                <div class="col-auto p-r-0">
                                    <i data-feather="shopping-cart" class="bg-light-danger feed-icon p-2 wid-30 hei-30"></i>
                                </div>
                                <div class="col">
                                    <a href="#!">
                                        <h6 class="m-b-5">New order received <span class="text-muted float-right f-14">30 min ago</span></h6>
                                    </a>
                                </div>
                            </div>
                            <div class="row m-b-25 align-items-center">
                                <div class="col-auto p-r-0">
                                    <i data-feather="file-text" class="bg-light-success feed-icon p-2 wid-30 hei-30"></i>
                                </div>
                                <div class="col">
                                    <a href="#!">
                                        <h6 class="m-b-5">You have 3 pending tasks. <span class="text-muted float-right f-14">Just Now</span></h6>
                                    </a>
                                </div>
                            </div>
                            <div class="row m-b-25 align-items-center">
                                <div class="col-auto p-r-0">
                                    <i data-feather="bell" class="bg-light-primary feed-icon p-2 wid-30 hei-30"></i>
                                </div>
                                <div class="col">
                                    <a href="#!">
                                        <h6 class="m-b-5">You have 4 tasks Done. <span class="text-muted float-right f-14">1 hours ago</span></h6>
                                    </a>
                                </div>
                            </div>
                            <div class="row m-b-25 align-items-center">
                                <div class="col-auto p-r-0">
                                    <i data-feather="file-text" class="bg-light-success feed-icon p-2 wid-30 hei-30"></i>
                                </div>
                                <div class="col">
                                    <a href="#!">
                                        <h6 class="m-b-5">You have 2 pending tasks. <span class="text-muted float-right f-14">Just Now</span></h6>
                                    </a>
                                </div>
                            </div>
                            <div class="row m-b-25 align-items-center">
                                <div class="col-auto p-r-0">
                                    <i data-feather="shopping-cart" class="bg-light-danger feed-icon p-2 wid-30 hei-30"></i>
                                </div>
                                <div class="col">
                                    <a href="#!">
                                        <h6 class="m-b-5">New order received <span class="text-muted float-right f-14">4 hours ago</span></h6>
                                    </a>
                                </div>
                            </div>
                            <div class="row m-b-25 align-items-center">
                                <div class="col-auto p-r-0">
                                    <i data-feather="shopping-cart" class="bg-light-danger feed-icon p-2 wid-30 hei-30"></i>
                                </div>
                                <div class="col">
                                    <a href="#!">
                                        <h6 class="m-b-5">New order Done <span class="text-muted float-right f-14">Just Now</span></h6>
                                    </a>
                                </div>
                            </div>
                            <div class="row m-b-25 align-items-center">
                                <div class="col-auto p-r-0">
                                    <i data-feather="file-text" class="bg-light-success feed-icon p-2 wid-30 hei-30"></i>
                                </div>
                                <div class="col">
                                    <a href="#!">
                                        <h6 class="m-b-5">You have 5 pending tasks. <span class="text-muted float-right f-14">5 hours ago</span></h6>
                                    </a>
                                </div>
                            </div>
                            <div class="row m-b-0 align-items-center">
                                <div class="col-auto p-r-0">
                                    <i data-feather="bell" class="bg-light-primary feed-icon p-2 wid-30 hei-30"></i>
                                </div>
                                <div class="col">
                                    <a href="#!">
                                        <h6 class="m-b-5">You have 4 tasks Done. <span class="text-muted float-right f-14">2 hours ago</span></h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        
    </div>
@endsection