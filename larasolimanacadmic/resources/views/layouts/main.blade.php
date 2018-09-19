<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>أكاديمية مسجد الرحمن</title>

    <!-- Scripts -->


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
                                        <img src="assets/img/soliman2.jpg" alt="Admin" />
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
        <div class="parent-wrapper" id="outer-wrapper">
            <!-- SIDE MENU -->
            <div class="sidebar-nav-wrapper" id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li>
                        <a href="admin-dashboard.html"><i class="fa fa-hotel menu-icon"></i> الرئيسية</a>
                    </li>
                    <li>
                        <a href="../incubation"><i class="fa fa-home menu-icon"></i> الحضانة</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-users menu-icon"></i> الطلاب <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="../incustudent/create"><i class="fa fa-caret-right"></i>اضافة طالب</a>
                            </li>
                            <li>
                                <a href="../incustudent"><i class="fa fa-caret-right"></i>كل الطلاب  </a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user-secret menu-icon"></i> المدرسين <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="admin-add-teacher.html"><i class="fa fa-caret-right"></i>اضافة مدرس</a>
                            </li>
                            <li>
                                <a href="admin-teacher-list.html"><i class="fa fa-caret-right"></i>كل المدرسين</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user-secret menu-icon"></i> الموظفين <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="admin-add-teacher.html"><i class="fa fa-caret-right"></i>اضافة موظف</a>
                            </li>
                            <li>
                                <a href="admin-teacher-list.html"><i class="fa fa-caret-right"></i>كل الموظفين</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user-secret menu-icon"></i> المسؤولين <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="admin-add-teacher.html"><i class="fa fa-caret-right"></i>اضافة مسؤول</a>
                            </li>
                            <li>
                                <a href="admin-teacher-list.html"><i class="fa fa-caret-right"></i>كل المسؤولين</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-book menu-icon"></i> المواد <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="admin-add-subject.html"><i class="fa fa-caret-right"></i>اضافة مادة</a>
                            </li>
                            <li>
                                <a href="admin-add-subject.html"><i class="fa fa-caret-right"></i>كل المواد</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-calendar menu-icon"></i> المصروفات <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="admin-create-timetable.html"><i class="fa fa-caret-right"></i>انشاء</a>
                            </li>
                            <li>
                                <a href="admin-class-timetable.html"><i class="fa fa-caret-right"></i>كل المصروفات</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </li>
                    <li>
                        <a href="message.html"><i class="fa fa-envelope menu-icon"></i> MY MESSAGES</a>
                    </li>
                    <li>
                        <a href="admin-add-announcement.html"><i class="fa fa-bullhorn menu-icon"></i> ANNOUNCEMENTS</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-file-o menu-icon"></i> CLASSES <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="admin-add-class.html"><i class="fa fa-caret-right"></i>ADD CLASS</a>
                            </li>
                            <li>
                                <a href="admin-add-section.html"><i class="fa fa-caret-right"></i>ADD SECTION</a>
                            </li>
                            <li>
                                <a href="admin-add-class.html"><i class="fa fa-caret-right"></i>VIEW SECTIONS</a>
                            </li>
                            <li>
                                <a href="admin-add-section.html"><i class="fa fa-caret-right"></i>VIEW CLASSES</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-address-card menu-icon"></i> REPORTS <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="teacher-attendence-report.html"><i class="fa fa-caret-right"></i>ATTENDENCE</a>
                            </li>
                            <li>
                                <a href="teacher-marks-report.html"><i class="fa fa-caret-right"></i>MARKS</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </li>
                </ul>
            </div>
            @yield('content')
        </div>

    </div>

    <script src="{{asset('js/jQuery_v3_2_0.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/owl.carousel.min.js')}}"></script>
    <script src="{{asset('plugins/Chart.min.js')}}"></script>
    <script src="{{asset('plugins/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('js/js.js')}}"></script>
    <script src="{{asset('js/style.js')}}"></script>
</body>
</html>
