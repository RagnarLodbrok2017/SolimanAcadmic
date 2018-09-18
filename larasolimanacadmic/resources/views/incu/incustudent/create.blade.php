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
                        {{ Form::open(array('route' => 'incustudent.store', 'method' => 'post'))}}
                        <div class="col-md-12">
                            <div class="dash-item first-dash-item">
                                <h6 class="item-title"><i class="fa fa-user"></i>STUDENT INFO</h6>
                                <div class="inner-item">
                                    <div class="dash-form">
                                        <div class="col-sm-3">
                                            <label class="clear-top-margin"><i class="fa fa-venus"></i>النوع</label>
                                            <select name="sex">
                                                <option>-- Select --</option>
                                                <option value="1">ذكر</option>
                                                <option value="0">أنثى</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>اللقب</label>
                                            {!!Form::text('last_name','',['placeholder' => 'محمد'])!!}
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>الأسم الثانى</label>
                                            {!!Form::text('middle_name','',['placeholder' => 'سمير'])!!}
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>الأسم الأول</label>
                                            {!!Form::text('first_name','',['placeholder' => 'أحمد'])!!}
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-sm-3">
                                            <label><i class="fa fa-calendar"></i>تاريخ الميلاد</label>
                                            {!! Form::date('dob') !!}
                                        </div>
                                        <div class="col-sm-3">
                                            <label><i class="fa fa-phone"></i>التليفون #</label>
                                            {!! Form::text('phone','',['placeholder' =>'01155798554']) !!}
                                        </div>
                                        <div class="col-sm-3">
                                            <label><i class="fa fa-phone"></i>العنوان #</label>
                                            {!! Form::text('address','',['placeholder'=>'شارع محمد على']) !!}
                                        </div>
                                        @if(isset($statuss))
                                        <div class="col-sm-3">
                                            <label><i class="fa fa-flag"></i>حالة الأبن </label>
                                            <select name="status_id">
                                                @foreach($statuss as $status)
                                                <option name="{{$status->id}}">{{$status->name}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                            @endif
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
                                            {!! Form::text('FPhone','',['placeholder' =>'0115481651']) !!}
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>أسم الأم</label>
                                            {!! Form::text('mother_name','',['placeholder' =>'الأم']) !!}
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>أسم الأب</label>
                                            {!! Form::text('father_name','',['placeholder' =>'الأب']) !!}
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-sm-3">
                                            <label><i class="fa fa-phone"></i>رقم تليفون ثانى #</label>
                                            {!! Form::text('LPhone','',['placeholder' =>'01654894965']) !!}
                                        </div>
                                        <div class="col-sm-3">
                                            <label><i class="fa fa-envelope-o"></i>الأميل</label>
                                            {!! Form::email('email','',['placeholder' =>'ahmed155@gmail.com']) !!}
                                        </div>
                                        <div class="col-sm-3">
                                            <label><i class="fa fa-flag"></i>الجنسية </label>
                                            <select name="nationality">
                                                <option value="مصرى">مصرى</option>
                                                <option value="تونسى">تونسى</option>
                                                <option value="سورى">سورى</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label><i class="fa fa-bell-o"></i>الديانة</label>
                                            <select>
                                                <option value="مسلم">مسلم</option>
                                                <option value="مسيحى">مسيحى</option>
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
                                        @if(isset($shifts))
                                        <div class="col-sm-3">
                                            <label class="clear-top-margin"><i class="fa fa-book"></i>الوقت</label>
                                            <select name="shift_id">
                                                @foreach($shifts as $shift)
                                                    <option name="{{$shift->id}}">{{$shift->time}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif
                                        @if(isset($levels))
                                        <div class="col-sm-3">
                                            <label class="clear-top-margin"><i class="fa fa-book"></i>السنة</label>
                                            <select name="level_id">
                                                @foreach($levels as $level)
                                                    <option name="{{$level->id}}">{{$level->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                            @endif
                                            @if(isset($classes))
                                        <div class="col-sm-3">
                                            <label class="clear-top-margin"><i class="fa fa-cogs"></i>الفصول</label>
                                            <select name="class_id">
                                                @foreach($classes as $class)
                                                    <option name="{{$class->id}}">{{$class->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                            @endif
                                        <div class="col-sm-3">
                                            <label class="clear-top-margin"><i class="fa fa-puzzle-piece"></i> المبلغ المقدم</label>
                                            {{ Form::number('payments','0',['placeholder' => '500']) }}
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
                        {{ Form::close() }}
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
