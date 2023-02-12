 @extends('Admin.layouts.app')
 @section('content')
<div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Branch Transaction</h5>
                                            <ul class="breadcrumb float-left">
                                                <li>
                                                    <a href="#"> <i class="fa fa-home"></i></a>
                                                </li>
                                                <li> /<a href="#!">Transfer</a>
                                                </li>
                                                <li> /<a href="#">Add Transfer</a>
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
                            <div class="page-wrapper">
                                <!-- Page-body start -->
                                <div class="page-body">
                                    <div class="card">
                                        <div class="card-block">
                                            <form method="post" action="{{route('post_transfer')}}" enctype="multipart/form-data">
                                            @csrf
                                            @if (session('alert'))
                                                    <div class="alert alert-success">
                                                        {{ session('alert') }}
                                                    </div>
                                            @endif
                                            <div class="form">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <label for="id">Sending</label>
                                                                <input type="number" name="sending_amount" class="form-control"
                                                                    placeholder="Enter amount" Required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 ">
                                                            <div class="form-group" style="padding-top: 29px;">
                                                                <label for="select" hidden></label>
                                                               <select class="form-control form-select form-select-lg m-t-2 border border-secondary p-1" name="sender_currency" style="height: 35px;" aria-label=".form-select-lg example">
                                                               @if($label == 1)    
                                                                   <option value="XAF">XAF</option>
                                                                @else
                                                                   <option value="USD">USD</option>
                                                                @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <label for="id">Recepient Receiver</label>
                                                                <input type="number" name="receiving_amount" class="form-control"
                                                                    placeholder="Enter amount" Required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 ">
                                                            <div class="form-group" style="padding-top: 29px;">
                                                                <label for="select" hidden></label>
                                                               <select class="form-control form-select form-select-lg m-t-2 border border-secondary p-1" name="receiver_currency" style="height: 35px;" aria-label=".form-select-lg example">
                                                               @if($label == 1)    
                                                                   <option value="USD">USD</option>
                                                                @else
                                                                <option value="XAF">XAF</option>

                                                                @endif
                                                                </select>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                     <div class="row m-l-5">
                                                           <h5>Sender Details</h5>
                                                    </div>
                                                        <!-- Line -->
                                                    <div class="row h-6 border border-secondary m-l-5"></div>
                                                    <br/>
                                                    <div class="row ">
                                                        <div class="col-lg-12 ">
                                                         <div class="form-group m-t-5">
                                                                <label for="id">Full Name</label>
                                                                <input type="text" name="sender_name" class="form-control"
                                                                    placeholder="Enter full name" Required>
                                                            </div>
                                                            </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-lg-12 ">
                                                         <div class="form-group m-t-5">
                                                                <label for="id">Address</label>
                                                                <input type="text" name="sender_address" class="form-control"
                                                                    placeholder="Enter address" Required>
                                                            </div>
                                                            </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-lg-12 ">
                                                         <div class="form-group m-t-5">
                                                                <label for="id">Phone</label>
                                                                <input type="text" name="sender_phone" class="form-control"
                                                                    placeholder="Enter phone" Required>
                                                            </div>
                                                            </div>
                                                    </div>
                                                    <!-- Recepient Detail -->
                                                     <div class="row m-l-5">
                                                           <h5>Recepient Details</h5>
                                                    </div>
                                                        <!-- Line -->
                                                    <div class="row h-6 border border-secondary m-l-5"></div>
                                                    <br/>
                                                    <div class="row ">
                                                        <div class="col-lg-12 ">
                                                         <div class="form-group m-t-5">
                                                                <label for="id">Full Name</label>
                                                                <input type="text" name="receiver_name" class="form-control"
                                                                    placeholder="Enter full name" Required>
                                                            </div>
                                                            </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-lg-12 ">
                                                         <div class="form-group m-t-5">
                                                                <label for="id">Address</label>
                                                                <input type="text" name="receiver_address" class="form-control"
                                                                    placeholder="Enter address" Required>
                                                            </div>
                                                            </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-lg-12 ">
                                                         <div class="form-group m-t-5">
                                                                <label for="id">Phone</label>
                                                                <input type="text" name="receiver_phone" class="form-control"
                                                                    placeholder="Enter phone" Required>
                                                            </div>
                                                         </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-lg-12 ">
                                                         <div class="form-group m-t-5">
                                                                <label for="id">Bank Account Detail</label>
                                                                <input type="text" name="bank_account" class="form-control"
                                                                    placeholder="Enter bank account detail" Required>
                                                            </div>
                                                         </div>
                                                    </div>
                                                     <!-- Other Detail -->
                                                     <div class="row m-l-5">
                                                           <h5>Other Details</h5>
                                                    </div>
                                                        <!-- Line -->
                                                    <div class="row h-6 border border-secondary m-l-5"></div>
                                                    <br/>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form_group">
                                                                <h6>Payment Receipts</h6>
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form_group">
                                                                <input type="file" " name="file" id="" Required>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                        <div class="form_group">
                                                             <label for="id">Comments</label>
                                                                <textarea type="text" name="comment" class="form-control"
                                                                placeholder="Enter Comment"></textarea>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <button type="submit" class="btn btn-success mt-3">Confirm</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>



                                    <!-- Project statustic end -->
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
