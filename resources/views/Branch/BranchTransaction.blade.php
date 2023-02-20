 @extends('Admin.layouts.app')
 @section('content')
 <style>
    .opening{
        margin-left:70%;font-weight:bold
    }
    @media only screen and (max-width: 600px) {
    .row1 {
        width:65%;
        margin-bottom:20px;
    }
    .row2 {
        width:35%;
    }

    .row3 {
        width:60%;
        margin-top:20px;
    }
    .row4 {
        width:40%;
        margin-top:20px;
    }
    .inner{
        margin-top:-10px;
    }
    .balance{
        font-size:18px;
        
    }
    .balance-row{
        width:40%;
    }
    .opening{
        margin-left:45%;font-weight:bold
    }
}
 </style>
    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                           <h5 class="m-b-10">Branch Transaction</h5>

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
                                            <div class="form">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-6 balance-row">
                                                            <div class="col-lg-6">
                                                                <h6>Available</h6>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <h1 class="balance">Balance</h1>
                                                            </div>
                                                         </div>
                                            
                                                    
                                                        <div class="col-lg-6 balance-row">
                                                        @if($currency == 1)
                                                             <h1 class="balance">{{number_format($total_balace)}} XAF</h1>
                                                        @else
                                                        <h1 class="balance">{{number_format($total_balace)}} USD</h1>

                                                        @endif
                                                        </div>
                                                    </div>
                                                    <?php 
                                                    $total_balace =0;
                                                    ?>
                                                    @foreach($payments as $payment)
                                                    <?php
                                                    $year = Carbon\Carbon::parse($payment->created_at)->year; 
                                                    $month = Carbon\Carbon::parse($payment->created_at)->month; 
                                                    $day = Carbon\Carbon::parse($payment->created_at)->day; 
                                                    ?>
                                                     @if($payment->user_id==$user_id && $payment->type == 'Expense')
                                                     
                                                     <div class="row h-6 border border-secondary m-l-5"></div>
                                                    <br/>
                                                     <div class="row">
                                                       <div class="col-lg-2 row1">
                                                           <h6>{{$day}}/{{$month}}/{{$year}}</h6> 
                                                        </div>
                                                        <div class="col-lg-2 row2">
                                                            <button style="font-weight:bold;color:white;background-color:red;border:1px solid red;padding:6px;;margin-bottom:5px">{{$payment->type}}</button>
                                                        </div>
                                                        <div class="col-lg-4 row3">
                                                            <h6>{{$payment->description}}</h6>
                                                        </div>
                                                        <div class="col-lg-4 row4">
                                                            <div class="col-lg-4">
                                                                <p>-{{number_format($payment->amount)}}</p>
                                                            </div>
                                                            <div class="col-lg-4 inner">
                                                                <p>Bal: {{number_format($payment->remaining_balance)}}</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    @elseif($payment->user_id==$user_id && $payment->type == 'Income')
                                                    
                                                     
                                                    <div class="row h-6 border border-secondary m-l-5"></div>
                                                    <br/>
                                                     <div class="row">
                                                     <div class="col-lg-2 row1">
                                                           <h6>{{$day}}/{{$month}}/{{$year}}</h6> 
                                                        </div>
                                                        <div class="col-lg-2 row2">
                                                            <button style="font-weight:bold;color:white;background-color:green;border:1px solid green;padding:6px;margin-bottom:5px">{{$payment->type}}</button>
                                                        </div>
                                                        <div class="col-lg-4 row3">
                                                            <h6>{{$payment->description}}</h6>
                                                        </div>
                                                        <div class="col-lg-4 row4">
                                                            <div class="col-lg-4">
                                                                <p>+{{number_format($payment->amount)}}</p>
                                                            </div>
                                                            <div class="col-lg-4 inner">
                                                                <p>Bal: {{number_format($payment->remaining_balance)}}</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    @elseif($payment->user_id==$user_id && $payment->type == 'Payout')
                                                   
                                                    <div class="row h-6 border border-secondary m-l-5"></div>
                                                    <br/>
                                                    <a href="{{"transfer_details/".$payment['transfer_id'] }}"> 
                                                    <div class="row">
                                                    <div class="col-lg-2 row1">
                                                           <h6>{{$day}}/{{$month}}/{{$year}}</h6> 
                                                        </div>
                                                        <div class="col-lg-2 row2">
                                                            <button style="font-weight:bold;color:white;background-color:red;border:1px solid red;padding:6px;;margin-bottom:5px">{{$payment->type}}</button>
                                                        </div>
                                                        <div class="col-lg-4 row3">
                                                        <h6>{{$payment->sender_name}} for {{$payment->receiver_name}}</h6>
                                                        </div>
                                                        <div class="col-lg-4 row4">
                                                            <div class="col-lg-4">
                                                                <p>-{{number_format($payment->amount)}}</p>
                                                            </div>
                                                            <div class="col-lg-4 inner">
                                                                <p>Bal: {{number_format($payment->remaining_balance)}}</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    </a>
                                                    @elseif($payment->user_id==$user_id && $payment->type == 'Payin')
                                                   
                                                    <div class="row h-6 border border-secondary m-l-5"></div>
                                                    <br/>
                                                    <a href="{{"transfer_details/".$payment['transfer_id'] }}">
                                                     <div class="row">
                                                     <div class="col-lg-2 row1">
                                                           <h6>{{$day}}/{{$month}}/{{$year}}</h6> 
                                                        </div>
                                                     <div class="col-lg-2 row2">
                                                            <button style="font-weight:bold;color:white;background-color:green;border:1px solid green;padding:6px;;margin-bottom:5px">Payin</button>
                                                        </div>
                                                        <div class="col-lg-4 row3">
                                                        <h6>{{$payment->sender_name}} for {{$payment->receiver_name}}</h6>
                                                        </div>
                                                        <div class="col-lg-4 row4">
                                                            <div class="col-lg-4">
                                                                <p>+{{number_format($payment->amount)}}</p>
                                                            </div>
                                                            <div class="col-lg-4 inner">
                                                                <p>Bal: {{number_format($payment->remaining_balance)}}</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    </a>
                                                    @endif
                                                    
                                                    @endforeach
                                                    
                                                        <!-- Line -->
                                                   
                                                    <div class="row h-6 border border-secondary m-l-5"></div>
                                                    
                                               <br>
                                               
                                                </div>
                                                {{ $payments->links('pagination::bootstrap-4') }}

                                            </div>
                                        </div>
                                    </div>



                                    <!-- Project statustic end -->
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
