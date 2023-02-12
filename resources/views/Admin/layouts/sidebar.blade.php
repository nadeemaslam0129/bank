<?php
namespace App\Http\Controllers;
use Auth;
$user_name = Auth::user()->name;
?>
 <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    <img class="img-80 img-radius" src="{{asset('assets/images/user-64.png')}}"
                                        alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span id="more-details"><?php echo $user_name ?><i class="fa fa-caret-down"></i></span>
                                    </div>
                                </div>
                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">

                                            <a href="{{route('logout')}}"><i
                                                    class="ti-layout-sidebar-left"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="" >
                                    <a href="/dashboard" class="waves-effect waves-dark" style="background-color:orange">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span>Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                               <li class="nav-item">
                                <a href="{{route('transfer_list')}}" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-id-badge"></i><b>D</b></span>
                                        <span>Transfer List</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                               <li class="nav-item">
                                <a href="{{route('branch_transaction')}}" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-id-badge"></i><b>D</b></span>
                                        <span>Branch Transaction</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                               <li class="nav-item">
                                <a href="{{route('add_income')}}" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-id-badge"></i><b>D</b></span>
                                        <span>Income</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                               <li class="nav-item">
                                <a href="{{route('add_expense')}}" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-id-badge"></i><b>D</b></span>
                                        <span>Expense</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            
                            
                        </div>
                    </nav>
                    <script>
                    var loc = location.href;
                    var loc_navs = document.getElementsByClassName("nav-item");
                    for (var i = 0; i < loc_navs.length; i++) {

                    if (loc_navs[i].getElementsByTagName('a')[0].getAttribute("href") == loc) {
                        loc_navs[i].className += " active";

                    }
                    }
                    </script>