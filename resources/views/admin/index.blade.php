<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--Page title-->
    <title>Admin Dashboard</title>
    <!--bootstrap-->
    <link rel="stylesheet" href="{{asset('panel/assets/css/bootstrap.min.css')}}">
    <!--font awesome-->
    <link rel="stylesheet" href="{{asset('panel/assets/css/all.min.css')}}">
    <!-- metis menu -->
    <link rel="stylesheet" href="{{asset('panel/assets/plugins/metismenu-3.0.4/assets/css/metisMenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('panel/assets/plugins/metismenu-3.0.4/assets/css/mm-vertical-hover.css')}}">
    <!-- chart -->

    <!-- <link rel="stylesheet" href="assets/plugins/chartjs-bar-chart/chart.css"> -->
    <!--Custom CSS-->
    <link rel="stylesheet" href="{{asset('panel/assets/css/style.css')}}">
</head>

<body id="page-top">
    <!-- preloader -->

    <header class="header_area">
                <!-- logo -->
                <ul class="header_menu">
               
                    <li><a href="{{route('admin.logout')}}"><i class="far fa-user"></i> Admin Logout</a>
                    <li>

                </ul>
            </header><!-- / header area -->

    <div class="wrapper without_header_sidebar">
        <!-- contnet wrapper -->
        <div class="content_wrapper">

            <section class="table_area">
                <div class="panel">
                  <br><br>
                    <div class="panel_header">
                        <div class="panel_title text-center">
                            <h3>Admin Dashboard</h3>
                        </div>
                    </div>
                    <br>
                    @if(Session::has('success'))

                    <div class="alert alert-success" role="alert">
                        {{session::get('success')}}
                    </div>
                    @endif
                    <div class="panel_header">
                        <div class="panel_title"><span>User Registration</span></div>
                    </div>
                    <div class="panel_body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Profile Photo</th>
                                        <th>Birth Day</th>
                                        <th data-hide="all">Date of Birth</th>
                                        <th>Anniversary Day</th>
                                        <th data-hide="all"> Anniversary Date</th>
                                        <th>Actiion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach($userdata as $user)
                                    
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->gender}}</td>
                                        <td>
                                            <img src="{{asset($user->profile_photo)}}" alt=""
                                                style="width: 80px; height: 80px">
                                        </td>
                                        <td>{{\Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($user->dob)->year(date('Y')), false)}} Days Left</td>
                                        <td>{{$user->dob}}</td>
                                        <td>{{$user->anniversary_date}}</td>
                                        <td>{{\Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($user->anniversary_date)->year(date('Y')), false)}} Days Left</td>
                                        @if($user->status == 1)
                                        <td>
                                            <a href="{{route('user.delete', $user->id)}}"
                                                class="btn btn-danger">Reject</a>
                                        </td>
                                        @else
                                        <td>
                                            <a href="{{route('user.approve', $user->id)}}"
                                                class="btn btn-primary">Approve</a>
                                            <a href="{{route('user.delete', $user->id)}}"
                                                class="btn btn-danger">Reject</a>
                                        </td>
                                        @endif

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- /table -->
            </section>
        </div>
    </div>
    <!--/ content wrapper -->
    </div>
    <!--/ wrapper -->


    <!-- jquery -->
    <script src="{{asset('panel/assets/js/jquery.min.js')}}"></script>
    <!-- popper Min Js -->
    <script src="{{asset('panel/assets/js/popper.min.js')}}"></script>
    <!-- Bootstrap Min Js -->
    <script src="{{asset('panel/assets/js/bootstrap.min.js')}}"></script>
    <!-- Fontawesome-->
    <script src="{{asset('panel/assets/js/all.min.js')}}"></script>
    <!-- metis menu -->
    <script src="{{asset('panel/assets/plugins/metismenu-3.0.4/assets/js/metismenu.js')}}"></script>
    <script src="{{asset('panel/assets/plugins/metismenu-3.0.4/assets/js/mm-vertical-hover.js')}}"></script>
    <!-- nice scroll bar -->
    <script src="{{asset('panel/assets/plugins/scrollbar/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('panel/assets/plugins/scrollbar/scroll.active.js')}}"></script>
    <!-- counter -->
    <script src="{{asset('panel/assets/plugins/counter/js/counter.js')}}"></script>
    <!-- chart -->
    <script src="{{asset('panel/assets/plugins/chartjs-bar-chart/Chart.min.js')}}"></script>
    <script src="{{asset('panel/assets/plugins/chartjs-bar-chart/chart.js')}}"></script>
    <!-- pie chart -->
    <script src="{{asset('panel/assets/plugins/pie_chart/chart.loader.js')}}"></script>
    <script src="{{asset('panel/assets/plugins/pie_chart/pie.active.js')}}"></script>


    <!-- Main js -->
    <script src="{{asset('panel/assets/js/main.js')}}"></script>





</body>

</html>
