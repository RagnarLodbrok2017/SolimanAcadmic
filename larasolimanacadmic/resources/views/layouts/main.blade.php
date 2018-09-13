<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>أكاديمية مسجد الرحمن</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" media="screen">

    <!-- Styles -->
    <link href="{{ asset('css/main/bootstrap.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('css/main/chartist.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('css/main/owl.carousel.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('css/main/owl.theme.default.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('css/main/style.css') }}" rel="stylesheet" media="screen">
</head>
<body>
    <div id="app">
        <div class="row dashboard-top-nav">
            <div class="col-sm-3 logo">
                <h5><i class="fa fa-book"></i>أكاديمية مسجد الرحمن</h5>
            </div>
            <div class="col-sm-4 top-search">
                <div class="search">
                    <i class="fa fa-search"></i>
                    <input type="text" placeholder="Search">
                </div>
            </div>
            <div class="col-sm-5 notification-area">
                <ul class="top-nav-list">
                    <li class="notification dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="badge nav-badge">3</span>
                        </a>
                        <ul class="dropdown-menu notification-list">
                            <li>
                                <div class="list-msg">
                                    <div class="col-xs-2 icon clear-padding">
                                        <i class="fa fa-trophy"></i>
                                    </div>
                                    <div class="col-sm-10 desc">
                                        <h5><a href="#">Upcoming Sports Meet</a></h5>
                                        <h6><i class="fa fa-clock-o"></i> 10 min ago</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </li>
                            <li>
                                <div class="list-msg">
                                    <div class="col-xs-2 icon clear-padding">
                                        <i class="fa fa-paint-brush"></i>
                                    </div>
                                    <div class="col-sm-10 desc">
                                        <h5><a href="#">Fine art workshop</a></h5>
                                        <h6><i class="fa fa-clock-o"></i> 1 hour ago</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </li>
                            <li>
                                <div class="list-msg">
                                    <div class="col-xs-2 icon clear-padding">
                                        <i class="fa fa-birthday-cake"></i>
                                    </div>
                                    <div class="col-sm-10 desc">
                                        <h5><a href="#">Annual fest</a></h5>
                                        <h6><i class="fa fa-clock-o"></i> 1 day ago</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </li>
                            <li>
                                <div class="list-msg">
                                    <div class="col-xs-2 icon clear-padding">
                                        <i class="fa fa-trophy"></i>
                                    </div>
                                    <div class="col-sm-10 desc">
                                        <h5><a href="#">Upcoming Sports Meet</a></h5>
                                        <h6><i class="fa fa-clock-o"></i> 10 min ago</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </li>
                            <li>
                                <div class="all-notifications">
                                    <a href="#">VIEW ALL NOTIFICATIONS</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="message dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-comment-o"></i>
                            <span class="badge nav-badge">5</span>
                        </a>
                        <ul class="dropdown-menu notification-list">
                            <li>
                                <div class="list-msg">
                                    <div class="col-xs-2 image clear-padding">
                                        <img src="{{ asset('img/soliman2.jpg') }}" alt="Admin" />
                                    </div>
                                    <div class="col-sm-10 desc">
                                        <h5><a href="#">Mohamed Soliman</a></h5>
                                        <p>The Manger of the Incubation.</p>
                                        <h6><i class="fa fa-clock-o"></i> 1 day ago</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </li>
                            <li>
                                <div class="list-msg">
                                    <div class="col-xs-2 image clear-padding">
                                        <img src="assets/img/parent/parent1.jpg" alt="Admin" />
                                    </div>
                                    <div class="col-sm-10 desc">
                                        <h5><a href="#">Mona Hesham</a></h5>
                                        <p>Helper.</p>
                                        <h6><i class="fa fa-clock-o"></i> 1 day ago</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </li>
                            <li>
                                <div class="all-notifications">
                                    <a href="#">VIEW ALL MESSAGES</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="user dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span><img src="{{ asset('img/soliman2.jpg') }}" alt="user">محمد سليمان<span class="caret"></span></span>
                        </a>
                        <ul class="dropdown-menu notification-list">
                            <li>
                                <a href="#"><i class="fa fa-users"></i> USER PROFILE</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-key"></i> CHANGE PASSWORD</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-cogs"></i> SETTINGS</a>
                            </li>
                            @if(auth())
                            <li>
                                <div class="all-notifications">
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                                @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        @yield('content')
    </div>

    <script src="{{asset('js/jQuery_v3_2_0.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/owl.carousel.min.js')}}"></script>
    <script src="{{asset('plugins/Chart.min.js')}}"></script>
    <script src="{{asset('plugins/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('js/js.js')}}"></script>
</body>
</html>
