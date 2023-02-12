
 @extends('Admin.layouts.app')
 @section('content')
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <style>
    @media only screen and (max-width: 600px) {
    .row1 {
        background-color:red;
        width:200px;
        }
}
  .active {
    background-color: #3db4fc24;
  }

  .down_icon {
    -webkit-transform: rotate(-90deg);
    transform: rotate(-90deg)
  }
  .zoom:hover {
  -ms-transform: scale(3); /* IE 9 */
  -webkit-transform: scale(3); /* Safari 3-8 */
  transform: scale(3); 
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
                                            <ul class="breadcrumb float-left">
                                                <li>
                                                    <a href="#"> <i class="fa fa-home"></i></a>
                                                </li>
                                                <li> /<a href="#"> Fullfill Transfer</a>
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
                                    @if (session('alert'))
                                                    <div class="alert alert-success">
                                                        {{ session('alert') }}
                                                    </div>
                                    @endif
                                        <div class="card">
                                            <div class="card-block">
                                                <div class="row justify-content-center">
                                                            <div class="col-1">
                                                                <img class="img-70 img-radius" src="https://static.vecteezy.com/system/resources/previews/000/574/512/original/vector-sign-of-user-icon.jpg" alt="This is image">

                                                            </div>
                                                            <div class="col-10 mx-0 ml-3">
                                                                <div class="col-8 mx-0">
                                                                    <h2>{{$transfer->sending_amount}} {{$transfer->sender_currency}} </h2>
                                                                </div>
                                                                <div class="col-12 mx-0">
                                                                    <h6>{{$transfer->sender_name}} for {{$transfer->receiver_name}}</h6>
                                                                </div>
                                                            </div>
                                                </div>
                                                <?php
                                                $year = Carbon\Carbon::parse($transfer->created_at)->year; 
                                                $month = Carbon\Carbon::parse($transfer->created_at)->month; 
                                                $day = Carbon\Carbon::parse($transfer->created_at)->day; 
                                                ?>
                                                 <div class="row justify-content-center">
                                                    <div class="col-10 mt-2">
                                                        <h6>Created by {{$user_name}} by {{$transfer->created_at->diffForHumans()}} on {{$day}}/{{$month}}/{{$year}}</h6>
                                                    </div>

                                                </div>
                                                <h3>Sender Details</h3>
                                                <hr>
                                                <div class="row">
                                                         <div class="col-4">
                                                            <h6>Name :</h6>
                                                         </div>
                                                         <div class="col-8">
                                                            <h6> {{$transfer->sender_name}}</h6>
                                                         </div>
                                                </div>
                                                 <div class="row">
                                                         <div class="col-4">
                                                            <h6>Address :</h6>
                                                         </div>
                                                         <div class="col-8">
                                                            <h6> {{$transfer->sender_address}}</h6>
                                                         </div>
                                                </div>
                                                <div class="row">
                                                         <div class="col-4">
                                                            <h6>Phone :</h6>
                                                         </div>
                                                         <div class="col-8">
                                                            <h6> {{$transfer->sender_phone}}</h6>
                                                         </div>
                                                </div>
                                                 <div class="row">
                                                         <div class="col-4">
                                                            <h6>Amount :</h6>
                                                         </div>
                                                         <div class="col-8">
                                                            <h6> {{number_format($transfer->sending_amount)}} {{$transfer->sender_currency}}</h6>
                                                         </div>
                                                </div>
                                                 <h3>Receiver Details</h3>
                                                <hr>
                                               <div class="row">
                                                         <div class="col-4">
                                                            <h6>Name :</h6>
                                                         </div>
                                                         <div class="col-8">
                                                            <h6> {{$transfer->receiver_name}}</h6>
                                                         </div>
                                                </div>
                                                 <div class="row">
                                                         <div class="col-4">
                                                            <h6>Address :</h6>
                                                         </div>
                                                         <div class="col-8">
                                                            <h6>{{$transfer->receiver_address}}</h6>
                                                         </div>
                                                </div>
                                                <div class="row">
                                                         <div class="col-4">
                                                            <h6>Phone :</h6>
                                                         </div>
                                                         <div class="col-8">
                                                            <h6>{{$transfer->receiver_phone}}</h6>
                                                         </div>
                                                </div>
                                                @if($transfer->status == 'closed')
                                                <div class="row">
                                                         <div class="col-4">
                                                            <h6>Accual Paid Amount :</h6>
                                                         </div>
                                                         <div class="col-4">
                                                         <h6>{{number_format($transfer->receiving_amount)}} {{$transfer->receiver_currency}}</h6>
                                                         </div>
                                                          
                                                </div>
                                                <div class="row">
                                                         <div class="col-4">
                                                            <h6>Amount to be Paid :</h6>
                                                         </div>
                                                         <div class="col-4">
                                                         <h6>{{number_format($transfer->amount_to_paid)}} {{$transfer->receiver_currency}}</h6>
                                                         </div>
                                                          
                                                </div>
                                                <br>
                                                <div class="row">
                                                         <div class="col-4">
                                                            <h6>Payment Receipt 1:</h6>
                                                         </div>
                                                         <div class="col-8">
                                                            <img src="{{URL::asset($transfer->receipt_image) }}" class="zoom" style="height:100px;width:100px">
                                                         </div>
                                                        
                                                </div>
                                                <br>
                                                <div class="row">

                                                  <div class="col-4">
                                                            <h6>Comment 1:</h6>
                                                 </div>
                                                   <div class="col-8">
                                                   <h6>{{$transfer->comment}}</h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                 <div class="row">
                                                         <div class="col-4">
                                                            <h6>Payment Receipt 2:</h6>
                                                         </div>
                                                         <div class="col-8">
                                                            <img src="{{URL::asset($transfer->receipt_image2) }}" class="zoom" style="height:100px;width:100px">
                                                         </div>
                                                        
                                                </div>
                                                <br>
                                                <div class="row">

                                                  <div class="col-4">
                                                            <h6>Comment 2:</h6>
                                                 </div>
                                                   <div class="col-8">
                                                   <h6>{{$transfer->comment2}}</h6>
                                                    </div>
                                                </div>
                                                @elseif($transfer->status == 'open' && $user_id != $transfer->user_id)
                                                <form method="post" action="{{route('update_transfer')}}" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="{{$transfer->id}}">
                                                 <div class="row">
                                                         <div class="col-4">
                                                            <h6>Accual Paid Amount :</h6>
                                                         </div>
                                                         <div class="col-4">
                                                         <h6>{{number_format($transfer->receiving_amount)}}{{$transfer->receiver_currency}}</h6>
                                                         </div>
                                                 </div>
                                                <div class="row">
                                                         <div class="col-4">
                                                            <h6>Amount To be Paid :</h6>
                                                         </div>
                                                         <div class="col-4">
                                                         <input name="amount_to_paid">{{$transfer->receiver_currency}}
                                                         </div>
                                                           
                                                </div>
                                                <div class="row">
                                                         <div class="col-4">
                                                            <h6>Payment Receipt 1 :</h6>
                                                         </div>
                                                         <div class="col-8">
                                                            <img src="{{URL::asset($transfer->receipt_image) }}"class="zoom" style="height:100px;width:100px">
                                                         </div>
                                                         
                                                </div>
                                                <div class="row">

                                                <div class="col-4">
                                                         <h6>Comment 1:</h6>
                                                </div>
                                                <div class="col-8">
                                                <h6>{{$transfer->comment}}</h6>
                                                </div> 
                                                </div>

                                                <br>
                                                <hr>
                                                <br>
                                                 <div class="row">
                                                         <div class="col-4">
                                                            <h6>Payment Receipt 2:</h6>
                                                         </div>
                                                         <div class="col-8">
                                                            <input type="file" name="file" id="" required>
                                                         </div>
                                                </div>
                                                <br>
                                                <div class="row">

                                                  <div class="col-4">
                                                            <h6>Comment 2:</h6>
                                                 </div>
                                                   <div class="col-8">
                                                   <textarea type="text" class="form-control input-lg" name="comment" id=""></textarea>                                                    </div>
                                                </div>
                                                <br>
                                                <button type="submit" class="btn btn-success">Confirm</button>
                                                @csrf
                                                </form>

                                                @else
                                                <div class="row">
                                                         <div class="col-4">
                                                            <h6>Accual Amount Paid :</h6>
                                                         </div>
                                                         <div class="col-4">
                                                         <h6>{{number_format($transfer->receiving_amount)}} {{$transfer->receiver_currency}}</h6>
                                                         </div>
                                                          
                                                </div>
                                                <br>
                                                 <div class="row">
                                                         <div class="col-4">
                                                            <h6>Payment Receipt :</h6>
                                                         </div>
                                                         <div class="col-8">
                                                            <img src="{{URL::asset($transfer->receipt_image) }}"class="zoom" style="height:100px;width:100px">
                                                         </div>
                                                         
                                                </div>
                                                <br>
                                                <div class="row">

                                                  <div class="col-4">
                                                            <h6>Comment:</h6>
                                                 </div>
                                                   <div class="col-8">
                                                   <h6>{{$transfer->comment}}</h6>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>


                                    </div>
                                </div>


                                <!-- Page-body end -->
                            </div>
                            <div id="styleSelector"> </div>
                        </div>
                    </div>
                </div>
@endsection
