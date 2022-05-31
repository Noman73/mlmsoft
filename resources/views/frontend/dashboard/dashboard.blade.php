
@extends('layouts.frontend.master')
@section('content')
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Hello, <span>Welcome Here</span></h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Home</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-money color-success border-success"></i>
                                </div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Total Sale</div>
                                    <div class="stat-digit">{{$total_sale}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-money color-primary border-primary"></i>
                                </div>
                                <div class="stat-content dib">
                                    <div class="stat-text">M Commision</div>
                                    <div class="stat-digit">{{$matching_commision}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-money color-pink border-pink"></i>
                                </div>
                                <div class="stat-content dib">
                                    <div class="stat-text">D. Comission</div>
                                    <div class="stat-digit">{{$direct_commision}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-money color-danger border-danger"></i>
                                </div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Total Balance</div>
                                    <div class="stat-digit">{{$total_balance}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-money color-danger border-danger"></i>
                                </div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Total Earn</div>
                                    <div class="stat-digit">{{$total_earn}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-money color-danger border-danger"></i>
                                </div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Total Withdraw</div>
                                    <div class="stat-digit">{{$total_withdraw}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>


@endsection
