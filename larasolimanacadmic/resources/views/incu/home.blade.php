@extends('layouts.main')

@section('content')

    <div class="parent-wrapper" id="outer-wrapper">

        <!-- SIDE MENU -->
        <div class="sidebar-nav-wrapper" id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li>
                    <a href="admin-dashboard.html"><i class="fa fa-hotel menu-icon"></i> الرئيسية</a>
                </li>
                <li>
                    <a href="admin-dashboard.html"><i class="fa fa-home menu-icon"></i> الحضانة</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-users menu-icon"></i> الطلاب <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="admin-add-student.html"><i class="fa fa-caret-right"></i>اضافة طالب</a>
                        </li>
                        <li>
                            <a href="admin-student-list.html"><i class="fa fa-caret-right"></i>كل الطلاب  </a>
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

        <!-- MAIN CONTENT -->
        <div class="main-content" id="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 clear-padding-xs">
                        <h5 class="page-title"><i class="fa fa-home"></i>الحضانة</h5>
                        <div class="section-divider"></div>
                        <div class="dashboard-stats">
                            <div class="col-sm-6 col-md-3">
                                <div class="stat-item">
                                    <div class="stats">
                                        <div class="col-xs-8 count">
                                            <h1>199</h1>
                                            <p>الطلاب</p>
                                        </div>
                                        <div class="col-xs-4 icon">
                                            <i class="fa fa-users ex-icon"></i>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="status">
                                        <p class="text-ex"><i class="fa fa-pencil-square-o"></i>عدد طلاب الحضانة</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="stat-item">
                                    <div class="stats">
                                        <div class="col-xs-8 count">
                                            <h1>8</h1>
                                            <p>المدرسين</p>
                                        </div>
                                        <div class="col-xs-4 icon">
                                            <i class="fa fa-user-secret danger-icon"></i>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="status">
                                        <p class="text-danger"><i class="fa fa-exclamation-triangle"></i>عدد مدرسين الحضانة</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="clearfix visible-sm"></div>
                            <div class="col-sm-6 col-md-3">
                                <div class="stat-item">
                                    <div class="stats">
                                        <div class="col-xs-8 count">
                                            <h1>900</h1>
                                            <p>الموظفين</p>
                                        </div>
                                        <div class="col-xs-4 icon">
                                            <i class="fa fa-flag look-icon"></i>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="status">
                                        <p class="text-look"><i class="fa fa-clock-o"></i>عدد موظفين الحضانة</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="stat-item">
                                    <div class="stats">
                                        <div class="col-xs-8 count">
                                            <h1>12</h1>
                                            <p>المسؤولين</p>
                                        </div>
                                        <div class="col-xs-4 icon">
                                            <i class="fa fa-user-secret danger-icon"></i>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="status">
                                        <p class="text-success"><i class="fa fa-folder-open-o"></i>عدد مسؤولين الحضانة</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 clear-padding-xs">
                        <div class="col-sm-8">
                            <div>
                                <div class="my-msg dash-item">
                                    <h6 class="item-title"><i class="fa fa-bar-chart"></i>الغيابات</h6>
                                    <div class="inner-item">
                                        <div class="summary-chart">
                                            <canvas id="studentAttendenceLine" height="100px"></canvas>
                                            <div class="chart-legends">
                                                <span class="red">ABSENT</span>
                                                <span class="orange">ON LEAVE</span>
                                                <span class="green">PRESENT</span>
                                            </div>
                                            <div class="chart-title">
                                                <h6 class="bottom-title">STUDENT ATTENDENCE TREND</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <div class="my-msg dash-item">
                                    <h6 class="item-title"><i class="fa fa-calendar"></i>TODAY'S TASK</h6>
                                    <div class="inner-item">
                                        <div class="timetable-item">
                                            <div class="col-xs-3 clear-padding">
                                                <p><span class="time">10 AM</span></p>
                                            </div>
                                            <div class="col-xs-9">
                                                <p class="title">Teacher Meeting</p>
                                                <p class="sent-by"><i class="fa fa-map-marker"></i> ROOM NO - 601</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="timetable-item">
                                            <div class="col-xs-3 clear-padding">
                                                <p><span class="time">11 AM</span></p>
                                            </div>
                                            <div class="col-xs-9">
                                                <p class="title">Campus Tour</p>
                                                <p class="sent-by"><i class="fa fa-map-marker"></i> CAMPUS</p>

                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="timetable-item">
                                            <div class="col-xs-3 clear-padding">
                                                <p><span class="time">12 PM</span></p>
                                            </div>
                                            <div class="col-xs-9">
                                                <p class="title">Parent Meeting</p>
                                                <p class="sent-by"><i class="fa fa-map-marker"></i> ROOM NO - 601</p>

                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="timetable-item">
                                            <div class="col-xs-3 clear-padding">
                                                <p><span class="time">01 PM</span></p>
                                            </div>
                                            <div class="col-xs-9">
                                                <p class="title">Guest Lecture</p>
                                                <p class="sent-by"><i class="fa fa-map-marker"></i> ROOM NO - 601</p>

                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="timetable-item">
                                            <div class="col-xs-3 clear-padding">
                                                <p><span class="time">02 PM</span></p>
                                            </div>
                                            <div class="col-xs-9">
                                                <p class="title">Teacher Meeting</p>
                                                <p class="sent-by"><i class="fa fa-map-marker"></i> ROOM NO - 601</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 clear-padding-xs">
                        <div class="col-sm-8">
                            <div>
                                <div class="my-msg dash-item">
                                    <h6 class="item-title"><i class="fa fa-bar-chart"></i>TODAY'S STUDENT ATTENDENCE</h6>
                                    <div class="inner-item">
                                        <div class="summary-chart">
                                            <canvas id="studentAttendenceBar" height="100px"></canvas>
                                            <div class="chart-legends">
                                                <span class="red">ABSENT</span>
                                                <span class="orange">ON LEAVE</span>
                                                <span class="green">PRESENT</span>
                                            </div>
                                            <div class="chart-title">
                                                <h6 class="bottom-title">STUDENT ATTENDENCE BAR</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <div class="my-msg dash-item">
                                    <h6 class="item-title"><i class="fa fa-pie-chart"></i>STUDENT ATTENDENCE</h6>
                                    <div class="chart-item">
                                        <canvas id="studentPie" height = 250px></canvas>
                                        <div class="chart-legends">
                                            <span class="red">ABSENT</span>
                                            <span class="orange">PRESENT</span>
                                            <span class="green">LEAVE</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 clear-padding-xs">
                        <div class="col-md-12">
                            <div class="my-msg dash-item">
                                <h6 class="item-title"><i class="fa fa-bullhorn"></i>ANNOUNCEMENTS</h6>
                                <div class="inner-item dashboard-tabs">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a  href="#1" data-toggle="tab"><i class="fa fa-graduation-cap"></i><span>ACADEMICS</span></a>
                                        </li>
                                        <li>
                                            <a href="#2" data-toggle="tab"><i class="fa fa-users"></i><span>ADMISSIONS</span></a>
                                        </li>
                                        <li>
                                            <a href="#3" data-toggle="tab"><i class="fa fa-trophy"></i><span>SPORTS</span></a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="1">
                                            <div class="announcement-item">
                                                <h5>Guest lecture on fine arts by Smith.<span class="new">New</span></h5>
                                                <h6><i class="fa fa-clock-o"></i>06-24-2017, 13:34</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                <div class="posted-by">
                                                    <p>Thanks,</p>
                                                    <h6>John Doe, Principal</h6>
                                                </div>
                                            </div>
                                            <div class="announcement-item">
                                                <h5>Guest lecture on fine arts by Smith</h5>
                                                <h6><i class="fa fa-clock-o"></i>06-24-2017, 13:34</h6>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                                <div class="posted-by">
                                                    <p>Thanks,</p>
                                                    <h6>John Doe, Principal</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="2">
                                            <div class="announcement-item">
                                                <h5>2</h5>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="3">
                                            <div class="announcement-item">
                                                <h5>3</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-togggle-btn">
                <a href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></a>
            </div>
            <div class="dash-footer col-lg-12">
                <p>Copyright Ahmed R.Mohamed</p>
            </div>
        </div>
    </div>


@endsection
