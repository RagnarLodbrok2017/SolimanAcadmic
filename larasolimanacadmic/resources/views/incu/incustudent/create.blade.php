@extends('layouts.main')

@section('content')
    <!-- MAIN CONTENT -->
    <div class="main-content" id="content-wrapper">
        <div class="container-fluid">
            {{--@if(session()->has('message'))--}}
            <div class="message_lara text-center animated bounceInRight" id="message_lara">
                <div class="alert alert-success">
                    تم اضافة الطالب !
                </div>
            </div>
            {{--@endif--}}
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <h5 class="page-title"><i class="fa fa-user"></i>اضافة طالب</h5>
                    <div class="section-divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    {{ Form::open(array('route' => 'incustudent.store', 'method' => 'post', 'id'=> 'addIncustudentForm'))}}
                    <input type="hidden" value="{{ csrf_token() }}" id="token">
                    <div class="col-md-12">
                        <div class="dash-item first-dash-item">
                            <h6 class="item-title"><i class="fa fa-user"></i>بيانات الطالب</h6>
                            <div class="inner-item">
                                <div class="dash-form">
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-venus"></i>النوع</label>
                                        <select name="sex" tabindex="4">
                                            <option value="1">ذكر</option>
                                            <option value="0">أنثى</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>اللقب</label>
                                        {!!Form::text('last_name','',['placeholder' => 'محمد','tabindex'=>'3'])!!}
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>الأسم الثانى</label>
                                        {!!Form::text('middle_name','',['placeholder' => 'سمير','tabindex'=>'2'])!!}
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>الأسم
                                            الأول</label>
                                        {!!Form::text('first_name','',['placeholder' => 'أحمد','tabindex'=>'1'])!!}
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-calendar"></i>تاريخ الميلاد</label>
                                        {!! Form::date('dob','',['tabindex'=>'8']) !!}
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-phone"></i>التليفون #</label>
                                        {!! Form::text('phone','',['placeholder' =>'01155798554','tabindex'=>'7']) !!}
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-address-book"></i>العنوان #</label>
                                        {!! Form::text('address','',['placeholder'=>'شارع محمد على','tabindex'=>'6']) !!}
                                    </div>
                                    @if(isset($statuss))
                                        <div class="col-sm-3">
                                            <label><i class="fa fa-flag"></i>حالة الأبن </label>
                                            <select name="status_id" tabindex="5">
                                                @foreach($statuss as $status)
                                                    <option value="{{$status->id}}">{{$status->name}}</option>
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
                                        {!! Form::text('job','',['placeholder' =>'الوظيفة','tabindex'=>'12']) !!}
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-phone"></i>رقم الموبيل #</label>
                                        {!! Form::text('FPhone','',['placeholder' =>'0115481651','tabindex'=>'11']) !!}
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>أسم
                                            الأم</label>
                                        {!! Form::text('mother_name','',['placeholder' =>'الأم','tabindex'=>'10']) !!}
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>أسم
                                            الأب</label>
                                        {!! Form::text('father_name','',['placeholder' =>'الأب','tabindex'=>'9']) !!}
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-phone"></i>رقم تليفون ثانى #</label>
                                        {!! Form::text('LPhone','',['placeholder' =>'01654894965','tabindex'=>'16']) !!}
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-envelope-o"></i>الأميل</label>
                                        {!! Form::email('email','',['placeholder' =>'ahmed155@gmail.com','tabindex'=>'15']) !!}
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-flag"></i>الجنسية </label>
                                        <select name="nationality" tabindex="14">
                                            <option value="مصرى">مصرى</option>
                                            <option value="تونسى">تونسى</option>
                                            <option value="سورى">سورى</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-bell-o"></i>الديانة</label>
                                        <select name="region" tabindex="13">
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
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-credit-card"></i> المبلغ المقدم</label>
                                        {{ Form::number('payment','0',['placeholder' => '500','tabindex'=>'20','min'=>'0']) }}
                                    </div>
                                    @if(isset($classes))
                                        <div class="col-sm-3">
                                            <label class="clear-top-margin"><i class="fa fa-cogs"></i>الفصول</label>
                                            <select name="classroom_id" id="classroom_id" tabindex="19">
                                                @foreach($classes as $key => $classroom_id)
                                                    <option
                                                        value="{{ $classroom_id->id }}">{{$classroom_id->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    @if(isset($levels))
                                        <div class="col-sm-3">
                                            <label class="clear-top-margin"><i class="fa fa-book"></i>السنة</label>
                                            <select name="level_id" tabindex="18">
                                                @foreach($levels as $level)
                                                    <option value="{{$level->id}}">{{$level->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    @if(isset($shifts))
                                        <div class="col-sm-3">
                                            <label class="clear-top-margin"><i class="fa fa-calendar"></i>الوقت</label>
                                            <select name="shift_id" tabindex="17">
                                                @foreach($shifts as $shift)
                                                    <option value="{{$shift->id}}">{{$shift->time}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    <div class="clearfix"></div>
                                    <div class="col-sm-12 text-center add_student">
                                        {{--<a href="#"><i class="fa fa-paper-plane"></i> اضافة</a>--}}
                                        {{Form::submit('اضافة',['id'=>'addIncustudent','tabindex'=>'21'])}}
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
