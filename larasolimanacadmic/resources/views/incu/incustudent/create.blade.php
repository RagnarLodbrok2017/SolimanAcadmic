@extends('layouts.main')

@section('content')
        <!-- MAIN CONTENT -->
        <div class="main-content" id="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 clear-padding-xs">
                        <h5 class="page-title"><i class="fa fa-user"></i>ADD STUDENT</h5>
                        <div class="section-divider"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 clear-padding-xs">
                        <div class="col-md-12">
                            <div class="dash-item first-dash-item">
                                <h6 class="item-title"><i class="fa fa-user"></i>STUDENT INFO</h6>
                                <div class="inner-item">
                                    <div class="dash-form">
                                        <div class="col-sm-3">
                                            <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>الأسم الأول</label>
                                            <input type="text" placeholder="Ahmed" />
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>الأسم الثانى</label>
                                            <input type="text" placeholder="Samir" />
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>اللقب</label>
                                            <input type="text" placeholder="Mohamed" />
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="clear-top-margin"><i class="fa fa-venus"></i>النوع</label>
                                            <select>
                                                <option>-- Select --</option>
                                                <option>ذكر</option>
                                                <option>أنثى</option>
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-sm-3">
                                            <label><i class="fa fa-calendar"></i>تاريخ الميلاد</label>
                                            <input type="text" id="studentDOB" placeholder="MM/DD/YYYY" />
                                        </div>
                                        <div class="col-sm-3">
                                            <label><i class="fa fa-phone"></i>التليفون #</label>
                                            <input type="text" placeholder="01156530289" />
                                        </div>
                                        <div class="col-sm-3">
                                            <label><i class="fa fa-bell-o"></i>الديانة</label>
                                            <select>
                                                <option>-- Select --</option>
                                                <option>مسلم</option>
                                                <option>مسيحى</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label><i class="fa fa-phone"></i>العنوان #</label>
                                            <input type="text" placeholder="H/N 42 Street# 10" />
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-sm-3">
                                            <label><i class="fa fa-file-picture-o"></i>رفع صورة</label>
                                            <input type="file" placeholder="90890" />
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="dash-item">
                                <h6 class="item-title"><i class="fa fa-user-secret"></i>بيانات الأب</h6>
                                <div class="inner-item">
                                    <div class="dash-form">
                                        <div class="col-sm-3">
                                            <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>أسم الأب</label>
                                            <input type="text" placeholder="Samir" />
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>أسم الأم</label>
                                            <input type="text" placeholder="Manal" />
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="clear-top-margin"><i class="fa fa-briefcase"></i>الوظيفة</label>
                                            <select>
                                                <option>-- Select --</option>
                                                <option>مدرس</option>
                                                <option>دكتور</option>
                                                <option>أخرى</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="clear-top-margin"><i class="fa fa-phone"></i>رقم الموبيل #</label>
                                            <input type="text" placeholder="1234567890" />
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-sm-3">
                                            <label><i class="fa fa-phone"></i>رقم تليفون ثانى #</label>
                                            <input type="text" placeholder="1234567890" />
                                        </div>
                                        <div class="col-sm-3">
                                            <label><i class="fa fa-envelope-o"></i>الأميل</label>
                                            <input type="text" placeholder="Samir@pathshala.com" />
                                        </div>
                                        <div class="col-sm-3">
                                            <label><i class="fa fa-flag"></i>الجنسية </label>
                                            <select>
                                                <option>-- أختار --</option>
                                                <option>مصرى</option>
                                                <option>تونسى</option>
                                                <option>سورى</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-3">
                                            <label><i class="fa fa-flag"></i>حالة الأبن </label>
                                            <select>
                                                <option>-- Select --</option>
                                                <option>عادى</option>
                                                <option>يتيم الأب</option>
                                                <option>يتيم الأم</option>
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="dash-item">
                                <h6 class="item-title"><i class="fa fa-book"></i>بيانات الحضانة</h6>
                                <div class="inner-item">
                                    <div class="dash-form">
                                        <div class="col-sm-3">
                                            <label class="clear-top-margin"><i class="fa fa-book"></i>الوقت</label>
                                            <select>
                                                <option>-- Select --</option>
                                                <option>من 8 الى 1</option>
                                                <option>من 1 الى 5</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="clear-top-margin"><i class="fa fa-book"></i>السنة</label>
                                            <select>
                                                <option>-- Select --</option>
                                                <option>KG 1</option>
                                                <option>KG 2</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="clear-top-margin"><i class="fa fa-cogs"></i>الفصول</label>
                                            <select>
                                                <option>-- Select --</option>
                                                <option>1 فصل</option>
                                                <option>فصل 2</option>
                                                <option>فصل 3</option>
                                                <option>فصل 4</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="clear-top-margin"><i class="fa fa-puzzle-piece"></i> المبلغ المقدم</label>
                                            <input type="text" placeholder="500" />
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-sm-12">
                                            <a href="#"><i class="fa fa-paper-plane"></i> SAVE</a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-togggle-btn">
                <a href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></a>
            </div>
            <div class="dash-footer col-lg-12">
                <p>Copyright Ahmed R. Mohamed</p>
            </div>
        </div>

@endsection
