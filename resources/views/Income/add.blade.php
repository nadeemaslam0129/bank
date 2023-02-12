 @extends('Admin.layouts.app')
 @section('content')
<div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Income</h5>
                                            <ul class="breadcrumb float-left">
                                                <li>
                                                    <a href="#"> <i class="fa fa-home"></i></a>
                                                </li>
                                                <li> /<a href="#!">Income</a>
                                                </li>
                                                <li> /<a href="#">Add Income</a>
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
                                            <form method="post" action="{{route('post_income')}}">
                                                @csrf
                                            <div class="form">
                                            @if (session('alert'))
                                                <div class="alert alert-success">
                                                    {{ session('alert') }}
                                                </div>
                                            @endif
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="amount">Amount</label>
                                                                <input type="number" class="form-control" name="amount"
                                                                    placeholder="Enter amount"required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="description">Description</label>
                                                                <textarea type="text" class="form-control" name="description"
                                                                    placeholder="Enter description" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="comment">Comment</label>
                                                                <textarea type="text" class="form-control" name="comment"
                                                                    placeholder="Enter Comment" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <button type="submit" class="btn btn-success">Confirm</button>
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
