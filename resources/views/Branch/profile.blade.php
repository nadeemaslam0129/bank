@extends('Admin.layouts.app')
 @section('content')
<div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Profile</h5>
                                            <ul class="breadcrumb float-left">
                                                <li>
                                                    <a href="#"> <i class="fa fa-home"></i></a>
                                                </li>
                                                <li> /<a href="#!">Profile</a>
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
                                            <form method="post" action="{{route('update_profile')}}">
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
                                                                <label for="amount">Name</label>
                                                                <input type="text" class="form-control" name="name"
                                                                    value="{{$user->name}}"required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="amount">Email</label>
                                                                <input type="text" class="form-control" name="email"
                                                                    value="{{$user->email}}"required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="amount">Password(If remain empty password will not be changed)</label>
                                                                <input type="text" class="form-control" name="password"
                                                                    placeholder="password">
                                                            </div>
                                                        </div>
                                                       
                                                        
                                                    </div>
                                                    <br>
                                                    <button type="submit" class="btn btn-success">Update</button>
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
