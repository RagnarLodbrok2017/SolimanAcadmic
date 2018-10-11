@extends('layouts.main2')

@section('content')
    <!-- MAIN CONTENT -->
    <div class="main-content" id="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <h5 class="page-title"><i class="fa fa-user"></i>اضافة طالب</h5>
                    <div class="section-divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    {{ Form::open(array('route' => 'storeStudentCenter', 'method' => 'post', 'id'=> ''))}}
                    <input type="hidden" value="{{ csrf_token() }}" id="token">
                    <div class="col-md-12">
                        <div class="dash-item first-dash-item">
                            <h6 class="item-title"><i class="fa fa-user"></i>بيانات الطالب</h6>
                            <div class="inner-item">
                                <div class="dash-form">
                                    {{--<div class="col-sm-3">
                                        <label><i class="fa fa-calendar"></i>تاريخ الميلاد</label>
                                        {!! Form::date('dob','',['tabindex'=>'4']) !!}
                                    </div>--}}
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-venus"></i>النوع</label>
                                        <select name="sex" tabindex="4">
                                            <option value="1">ذكر</option>
                                            <option value="0">أنثى</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>اللقب</label>
                                        {!!Form::text('last_name','',['placeholder' => '','tabindex'=>'3','required'])!!}
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>الأسم الثانى</label>
                                        {!!Form::text('middle_name','',['placeholder' => '','tabindex'=>'2','required'])!!}
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>الأسم
                                            الأول</label>
                                        {!!Form::text('first_name','',['placeholder' => '','tabindex'=>'1','required'])!!}
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-money"></i>المصاريف</label>
                                        {!! Form::number('payment','',['tabindex'=>'8','min'=> 0,'required']) !!}
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-phone"></i>التليفون #</label>
                                        {!! Form::text('phone','',['placeholder' =>'','tabindex'=>'7','maxlength'=>11]) !!}
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-address-book"></i>العنوان #</label>
                                        {!! Form::text('address','',['placeholder'=>'','tabindex'=>'6']) !!}
                                    </div>
                                    @if(isset($stages))
                                        <div class="col-sm-3">
                                            <label><i class="fa fa-flag"></i>المستوى</label>
                                            <select name="stage_id" tabindex="5">
                                                @foreach($stages as $stage)
                                                    <option value="{{$stage->id}}">{{$stage->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-sm-12 text-center add_student dash-form" style="margin-bottom: 50px">
                                {{--<a href="#"><i class="fa fa-paper-plane"></i> اضافة</a>--}}
                                {{Form::submit('اضافة',['class'=>'submit_student','tabindex'=>'9'])}}
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
