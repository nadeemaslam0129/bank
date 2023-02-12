 @extends('Admin.layouts.app')
 @section('content')
<div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Dashboard</h5>
                                            <ul class="breadcrumb float-left">
                                                <li>
                                                    <a href="#"> <i class="fa fa-home"></i></a>
                                                </li>
                                                <li> /<a href="#!"> Dashboard</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->


                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            



                                            <!--  sale analytics start -->

                                            <div class="col-md-12 col-xs-6">
                                                <div class="row">
                                                    <!-- sale card start -->

                                                    <div class="col-md-6">
                                                        <div class="card text-center order-visitor-card">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0">Total Payout</h6>
                                                                <h4 class="m-t-15 m-b-15"><i
                                                                        class="fa fa-arrow-down m-r-15 text-c-red"></i>{{number_format($total_payout)}}
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="card text-center order-visitor-card">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0">Total Payin</h6>
                                                                <h4 class="m-t-15 m-b-15"><i
                                                                        class="fa fa-arrow-up m-r-15 text-c-green"></i>{{number_format($total_payin)}}
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="card text-center order-visitor-card">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0">Total Expense</h6>
                                                                <h4 class="m-t-15 m-b-15"><i
                                                                        class="fa fa-arrow-down m-r-15 text-c-red"></i>{{number_format($total_expense)}}
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="card text-center order-visitor-card">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0">Total Income</h6>
                                                                <h4 class="m-t-15 m-b-15"><i
                                                                        class="fa fa-arrow-up m-r-15 text-c-green"></i>{{number_format($total_income)}}
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- sale card end -->
                                                </div>
                                            </div>

                                            <!-- Project statustic end -->
                                        </div>

                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
@endsection
