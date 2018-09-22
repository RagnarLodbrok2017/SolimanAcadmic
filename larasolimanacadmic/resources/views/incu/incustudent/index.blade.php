@extends('layouts.main')

@section('content')
    <!-- MAIN CONTENT -->
    <div class="main-content" id="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <h5 class="page-title"><i class="fa fa-users"></i>كل الطلاب</h5>
                    <div class="section-divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <div class="col-lg-12">
                        <div class="dash-item first-dash-item">
                            <h6 class="item-title"><i class="fa fa-user"></i>الطلاب</h6>
                            <div class="inner-item">
                                <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th><i class="fa fa-tasks"></i>ACTION</th>
                                        <th><i class="fa fa-envelope-o"></i>المصاريف</th>
                                        <th><i class="fa fa-puzzle-piece"></i>الحالة</th>
                                        <th><i class="fa fa-phone"></i>الموبيل</th>
                                        <th><i class="fa fa-cogs"></i>الفترة</th>
                                        <th><i class="fa fa-book"></i>الفصل</th>
                                        <th><i class="fa fa-id-card"></i>المستوى</th>
                                        <th><i class="fa fa-user"></i>الأسم</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($students))
                                        @foreach($students  as $index => $student)
                                            <tr>
                                                <td class="action-link">
                                                    <a class="delete" href="#" title="حذف" data-toggle="modal"
                                                       data-target="#deleteDetailModal"><i class="fa fa-remove"></i></a>
                                                    <a class="edit" href="#" title="تعديل" data-toggle="modal"
                                                       data-target="#editDetailModal{{$index}}"><i class="fa fa-edit"></i></a>
                                                </td>
                                                <td>{{ $student->payment['price'] }}</td>
                                                <td> {{ $student->status['name'] }} </td>
                                                <td>{{ $student->phone }}</td>
                                                <td>{{ $student->shift['time'] }}</td>
                                                <td> {{ $student->classroom['name'] }} </td>
                                                <td>{{ $student->level['name'] }}</td>
                                                <td>{{ $student->getFullNameAttribute() }}</td>
                                            </tr>
                                            <!--Edit details modal-->
                                            <div id="editDetailModal{{$index}}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title"><i class="fa fa-edit"></i>تعديل بيانات الطالب</h4>
                                                        </div>
                                                        <div class="modal-body dash-form">
                                                            <div class="col-sm-3">
                                                                <label class="clear-top-margin"><i class="fa fa-user"></i>الأسم الأول</label>
                                                                {!!Form::text('first_name',$student->first_name,['placeholder' => ''])!!}
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label class="clear-top-margin"><i class="fa fa-user"></i>الأسم الثانى</label>
                                                                {!!Form::text('middle_name',$student->middle_name,['placeholder' => ''])!!}
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label class="clear-top-margin"><i class="fa fa-user"></i>اللقب</label>
                                                                {!!Form::text('last_name',$student->last_name,['placeholder' => ''])!!}
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label class="clear-top-margin"><i class="fa fa-phone"></i>التليفون</label>
                                                                {!! Form::text('phone',$student->phone,['placeholder' =>'']) !!}
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-sm-3">
                                                                <label><i class="fa fa-cogs"></i>الفصل</label>
                                                                @if(isset($classes))
                                                                    <select name="classroom_id" id="classroom_id">
                                                                        @foreach($classes as $key => $classroom_id)
                                                                            <option value="{{ $classroom_id->id }}"  @if($classroom_id->id == $student->classroom_id) selected='selected' @endif >{{ $classroom_id->name }}</option>
                                                                            {{--<option value="{{ $classroom_id->id }}">{{$classroom_id->name}}</option>--}}
                                                                        @endforeach
                                                                    </select>
                                                                @endif
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label><i class="fa fa-calendar"></i>الوقت</label>
                                                                @if(isset($shifts))
                                                                    <select name="shift_id">
                                                                        @foreach($shifts as $shift)
                                                                            <option value="{{ $shift->id }}"  @if($shift->id == $student->shift_id) selected='selected' @endif >{{ $shift->time }}</option>
                                                                            {{--<option value="{{$shift->id}}">{{$shift->time}}</option>--}}
                                                                        @endforeach
                                                                    </select>
                                                                @endif
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label><i class="fa fa-credit-card"></i>المبلغ المقدم</label>
                                                                {{ Form::number('payment',$student->payment['price'],['placeholder' => '']) }}
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label><i class="fa fa-envelope-o"></i>حالة الطالب</label>
                                                                @if(isset($statuss))
                                                                    <select name="status_id">
                                                                        @foreach($statuss as $status)
                                                                            <option value="{{$status->id}}"  @if( $status->name == $student->status_id) selected='selected' @endif >{{ $status->name }}</option>
                                                                            {{--<option value="{{$status->id}}">{{$status->name}}</option>--}}
                                                                        @endforeach
                                                                    </select>
                                                                @endif
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="table-action-box">
                                                                <a href="#" class="save"><i class="fa fa-check"></i>SAVE</a>
                                                                <a href="#" class="cancel" data-dismiss="modal"><i class="fa fa-ban"></i>CLOSE</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
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


        <!-- Delete Modal -->
        <div id="deleteDetailModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-trash"></i>DELETE STUDENT</h4>
                    </div>
                    <div class="modal-body">
                        <div class="table-action-box">
                            <a href="#" class="save"><i class="fa fa-check"></i>YES</a>
                            <a href="#" class="cancel" data-dismiss="modal"><i class="fa fa-ban"></i>CLOSE</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>


        <!--Edit details modal-->
        {{--<div id="editDetailModal" class="modal fade" role="dialog">--}}
            {{--<div class="modal-dialog">--}}
                {{--<!-- Modal content-->--}}
                {{--<div class="modal-content">--}}
                    {{--<div class="modal-header">--}}
                        {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                        {{--<h4 class="modal-title"><i class="fa fa-edit"></i>تعديل بيانات الطالب</h4>--}}
                    {{--</div>--}}
                    {{--<div class="modal-body dash-form">--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<label class="clear-top-margin"><i class="fa fa-user"></i>الأسم الأول</label>--}}
                            {{--{!!Form::text('first_name',$student->first_name,['placeholder' => ''])!!}--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<label class="clear-top-margin"><i class="fa fa-user"></i>الأسم الثانى</label>--}}
                            {{--{!!Form::text('middle_name',$student->middle_name,['placeholder' => ''])!!}--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<label class="clear-top-margin"><i class="fa fa-user"></i>اللقب</label>--}}
                            {{--{!!Form::text('last_name',$student->last_name,['placeholder' => ''])!!}--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<label class="clear-top-margin"><i class="fa fa-phone"></i>التليفون</label>--}}
                            {{--{!! Form::text('phone',$student->phone,['placeholder' =>'']) !!}--}}
                        {{--</div>--}}
                        {{--<div class="clearfix"></div>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<label><i class="fa fa-cogs"></i>الفصل</label>--}}
                            {{--@if(isset($classes))--}}
                                {{--<select name="classroom_id" id="classroom_id">--}}
                                    {{--@foreach($classes as $key => $classroom_id)--}}
                                        {{--<option value="{{ $classroom_id->id }}">{{$classroom_id->name}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<label><i class="fa fa-calendar"></i>الوقت</label>--}}
                            {{--@if(isset($shifts))--}}
                                {{--<select name="shift_id">--}}
                                    {{--@foreach($shifts as $shift)--}}
                                        {{--<option value="{{$shift->id}}">{{$shift->time}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<label><i class="fa fa-credit-card"></i>المبلغ المقدم</label>--}}
                            {{--{{ Form::number('payment','',['placeholder' => '']) }}--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<label><i class="fa fa-envelope-o"></i>حالة الطالب</label>--}}
                            {{--@if(isset($statuss))--}}
                                {{--<select name="status_id">--}}
                                    {{--@foreach($statuss as $status)--}}
                                        {{--<option value="{{$status->id}}">{{$status->name}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}
                    {{--<div class="modal-footer">--}}
                        {{--<div class="table-action-box">--}}
                            {{--<a href="#" class="save"><i class="fa fa-check"></i>SAVE</a>--}}
                            {{--<a href="#" class="cancel" data-dismiss="modal"><i class="fa fa-ban"></i>CLOSE</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        <!--Edit details modal-->
        {{--<div id="editDetailModal" class="modal fade" role="dialog">--}}
            {{--<div class="modal-dialog">--}}
                {{--<!-- Modal content-->--}}
                {{--<div class="modal-content">--}}
                    {{--<div class="modal-header">--}}
                        {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                        {{--<h4 class="modal-title"><i class="fa fa-edit"></i>تعديل بيانات الطالب</h4>--}}
                    {{--</div>--}}
                    {{--<div class="modal-body dash-form">--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<label class="clear-top-margin"><i class="fa fa-user"></i>الأسم الأول</label>--}}
                            {{--{!!Form::text('first_name','',['placeholder' => ''])!!}--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<label class="clear-top-margin"><i class="fa fa-user"></i>الأسم الثانى</label>--}}
                            {{--{!!Form::text('first_name','',['placeholder' => ''])!!}--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<label class="clear-top-margin"><i class="fa fa-user"></i>اللقب</label>--}}
                            {{--{!!Form::text('first_name','',['placeholder' => ''])!!}--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<label class="clear-top-margin"><i class="fa fa-phone"></i>التليفون</label>--}}
                            {{--{!! Form::text('phone','',['placeholder' =>'']) !!}--}}
                        {{--</div>--}}
                        {{--<div class="clearfix"></div>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<label><i class="fa fa-cogs"></i>الفصل</label>--}}
                            {{--@if(isset($classes))--}}
                                {{--<select name="classroom_id" id="classroom_id">--}}
                                    {{--@foreach($classes as $key => $classroom_id)--}}
                                        {{--<option value="{{ $classroom_id->id }}">{{$classroom_id->name}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<label><i class="fa fa-calendar"></i>الوقت</label>--}}
                            {{--@if(isset($shifts))--}}
                                {{--<select name="shift_id">--}}
                                    {{--@foreach($shifts as $shift)--}}
                                        {{--<option value="{{$shift->id}}">{{$shift->time}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<label><i class="fa fa-credit-card"></i>المبلغ المقدم</label>--}}
                            {{--{{ Form::number('payment','',['placeholder' => '']) }}--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<label><i class="fa fa-envelope-o"></i>حالة الطالب</label>--}}
                            {{--@if(isset($statuss))--}}
                                {{--<select name="status_id">--}}
                                    {{--@foreach($statuss as $status)--}}
                                        {{--<option value="{{$status->id}}">{{$status->name}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}
                    {{--<div class="modal-footer">--}}
                        {{--<div class="table-action-box">--}}
                            {{--<a href="#" class="save"><i class="fa fa-check"></i>SAVE</a>--}}
                            {{--<a href="#" class="cancel" data-dismiss="modal"><i class="fa fa-ban"></i>CLOSE</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
@endsection
