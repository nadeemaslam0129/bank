 @extends('Admin.layouts.app')
 @section('content')
 <style>
    @media only screen and (max-width: 600px) {
    .row1 {
        width:24%;
    }
    .balance{
        font-size:18px;
        
    }
    .balance-row{
        width:40%;
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
                                            <h5 class="m-b-10">Transfer List</h5>

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
                                                        <div class="col-lg-6 balance-row" >
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
                                                    
                                                    @foreach($transfers as $t)
                                                    <?php
                                                    $year = Carbon\Carbon::parse($t->created_at)->year; 
                                                    $month = Carbon\Carbon::parse($t->created_at)->month; 
                                                    $day = Carbon\Carbon::parse($t->created_at)->day; 
                                                    ?>
                                                    <a href="{{"transfer_details/".$t['id'] }}"> 
                                                    <div class="row h-6 border border-secondary m-l-5"></div>
                                                        <br/>
                                                        <div class="row">
                                                            <div class="col-lg-3 row1">
                                                                <h6>{{$day}}/{{$month}}/{{$year}}</h6>
                                                            </div>
                                                            <div class="col-lg-3 row1">
                                                                @if($t->status == 'open')
                                                                <button style="font-weight:bold;color:white;background-color:green;border:1px solid green;padding:6px;margin-bottom:5px">{{$t->status}}</button>
                                                                @else
                                                                <button style="font-weight:bold;color:white;background-color:red;border:1px solid red;padding:6px;;margin-bottom:5px">{{$t->status}}</button>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-3 row1">
                                                                <h6>{{$t->sender_name}} for {{$t->receiver_name}}</h6>
                                                            </div>
                                                            <div class="col-lg-3 row1">
                                                                @if($user_id == $t->user_id)
                                                                <h6>{{number_format($t->sending_amount)}} {{$t->sender_currency}}</h6>
                                                                @else
                                                                <h6>{{number_format($t->receiving_amount)}} {{$t->receiver_currency}}</h6>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </a>
                                                    @endforeach
                                                    <div class="row h-6 border border-secondary m-l-5"></div>
                                                    <br>
                                                    <br>
                                                    
                                                    {{ $transfers->links('pagination::bootstrap-4') }}                 
                                                    <br/><br/><br/><br/>
                                                     
                                                    <a href="{{route('add_transfer')}}"><div class="btn btn-success mx-2 ml-6">Add Transfer</div></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- Project statustic end -->
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
