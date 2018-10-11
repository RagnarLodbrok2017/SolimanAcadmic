@extends('layouts.main')

@section('content')
    <!-- MAIN CONTENT -->
    <div class="main-content" id="content-wrapper">
        <div class="container-fluid animated bounceInDown">
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <h5 class="page-title"><i class="fa fa-user"></i>اضافة موظف</h5>
                    <div class="section-divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    {{ Form::open(array('route' => 'stuff.store', 'method' => 'post', 'id'=> 'addStuffForm'))}}
                    <input type="hidden" value="{{ csrf_token() }}" id="token">
                    <div class="col-md-12">
                        <div class="dash-item first-dash-item">
                            <h6 class="item-title"><i class="fa fa-user"></i>بيانات الموظف</h6>
                            <div class="inner-item" style="margin-bottom: 100px;">
                                <div class="dash-form">
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-credit-card"></i> المرتب </label>
                                        {{ Form::number('salary','0',['placeholder' => '','tabindex'=>'4','min'=>'0']) }}
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-phone"></i>رقم الموبيل #</label>
                                        {!! Form::text('phone','',['placeholder' =>'','tabindex'=>'3']) !!}
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-venus"></i>وقت العمل</label>
                                        <select name="shift" tabindex="2">
                                            <option value="صباحى">صباحى</option>
                                            <option value="مسائى">مسائى</option>
                                            <option value="طوال اليوم">طوال اليوم</option>
                                            <option value="أخرى">اخرى</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>الأسم</label>
                                        {!!Form::text('name','',['placeholder' => '','tabindex'=>'1'])!!}
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-sm-3">
                                        <label class=""><i class="fa fa-money"></i>هل تم دفع المرتب</label>
                                        <select name="salary_get" tabindex="8">
                                            <option value="0">لا</option>
                                            <option value="1">نعم</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class=""><i class="fa fa-database"></i>تاريخ العمل</label>
                                        {!!Form::date('work_date','',['placeholder' => '','tabindex'=>'7'])!!}
                                    </div>
                                    <div class="col-sm-3">
                                        <label><i class="fa fa-address-book"></i>الوظيفة</label>
                                        {!! Form::text('job','',['placeholder'=>'','tabindex'=>'6']) !!}
                                    </div>
                                    @if(isset($types))
                                        <div class="col-sm-3 multi_select">
                                            <label><i class="fa fa-flag"></i>يعمل فى</label>
                                            <select id="" name="types[]" tabindex="5" multiple class="form-control framework" required>
                                                @foreach($types as $type)
                                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    <div class="clearfix"></div>
                                    <div class="col-sm-12 text-center" style="margin-top: 35px">
                                        {{Form::submit('اضافة',['id'=>'addStuff','tabindex'=>'9'])}}
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
