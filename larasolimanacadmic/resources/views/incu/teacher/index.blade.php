@extends('layouts.main')

@section('content')
    <!-- MAIN CONTENT -->
    <div class="main-content" id="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <h5 class="page-title"><i class="fa fa-users"></i>كل مدرسين الحضانه</h5>
                    <div class="section-divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <div class="col-lg-12">
                        <div class="dash-item first-dash-item">
                            <h6 class="item-title"><i class="fa fa-user"></i>المدرسين</h6>
                            <div class="inner-item">
                                <table id="attendenceDetailedTable"
                                       class="display responsive nowrap table-hover table-bordered" cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th class="text-center"><i class="fa fa-tasks"></i>ACTION</th>
                                        <th class="text-center"><i class="fa fa-money"></i>دفع المرتب</th>
                                        <th class="text-center"><i class="fa fa-credit-card"></i>المرتب</th>
                                        <th class="text-center"><i class="fa fa-book"></i>تاريخ العمل</th>
                                        <th class="text-center"><i class="fa fa-book"></i>مواد</th>
                                        {{--<th class="text-center"><i class="fa fa-id-card"></i>العنوان</th>--}}
                                        <th class="text-center"><i class="fa fa-phone"></i>الموبيل</th>
                                        <th class="text-center"><i class="fa fa-user"></i>الأسم</th>
                                        <th class="text-center">#</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($teachers))
                                        @foreach($teachers  as $index => $teacher)
                                            <tr>
                                                <td class="action-link text-center">
                                                    <a class="delete DeleteIncuTeacher" href="#" title="حذف"
                                                       data-toggle="modal" data-id="{{$teacher->id}}"
                                                       data-target="#deleteDetailModal"><i class="fa fa-remove"></i></a>
                                                    <a class="edit EditIncuTeacherUpdate" href="#" title="تعديل"
                                                       data-toggle="modal" data-id="{{$teacher->id}}"
                                                       data-target="#editDetailModal">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    @if( $teacher->salary_get == 0)
                                                        <button type="button" class="btn btn-danger btn-outline disabled">لم يتم دفع المرتب</button>
                                                    @else
                                                        <button type="button"
                                                                class="btn btn-success btn-outline disabled">تم دفع المرتب</button>
                                                    @endif
                                                </td>
                                                <td class="text-center"> {{ $teacher->salary }} </td>
                                                <td class="text-center">{{ $teacher->work_date }}</td>
                                                <td class="text-center">
                                                    @foreach($teacher->Incusubjects as $incusubject)
                                                        {{$incusubject->name}}
                                                    @endforeach
                                                </td>
                                                {{--<td class="text-center"> {{ $teacher->address }} </td>--}}
                                                <td class="text-center">{{ $teacher->phone }}</td>
                                                <td class="text-center" style="font-weight: bold">{{ $teacher->name }}</td>
                                                <td class="text-center">{{ $index+1 }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid details_of_any">
                <div class="row">
                    <div class="col-lg-12 clear-padding-xs">
                        <h4 class="page-title text-center"><i class="fa fa-book"></i>التفاصيل</h4>
                        <div class="dashboard-stats">
                            <div class="col-sm-6 col-md-3">
                                <div class="stat-item">
                                    <div class="stats">
                                        <div class="col-xs-8 count">
                                            @if(isset($TotalIncuTeachers))
                                                <h1>{{$TotalIncuTeachers}}</h1>
                                            @endif
                                            <p class="head_p">عدد المدرسين </p>
                                        </div>
                                        <div class="col-xs-4 icon">
                                            <i class="fa fa-flag look-icon"></i>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="status">
                                        <p class="text-look"><i class="fa fa-clock-o"></i>عدد مدرسين الحضانة</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="stat-item">
                                    <div class="stats">
                                        <div class="col-xs-8 count">
                                            @if(isset($TotalSalaries_not_done))
                                                <h1>{{$TotalSalaries_not_done}}</h1>
                                            @endif
                                            <p class="head_p">مرتبات لم يتم دفعها</p>
                                        </div>
                                        <div class="col-xs-4 icon">
                                            <i class="fa fa-times-circle danger-icon"></i>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="status">
                                        <p class="text-danger"><i class="fa fa-exclamation-triangle"></i>مرتبات ناقصه</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="stat-item">
                                    <div class="stats">
                                        <div class="col-xs-8 count">
                                            @if(isset($TotalSalaries_done))
                                                <h1>{{$TotalSalaries_done}}</h1>
                                            @endif
                                            <p class="head_p"> مرتبات تم دفعها</p>
                                        </div>
                                        <div class="col-xs-4 icon">
                                            <i class="fa fa-check-circle success-icon"></i>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="status">
                                        <p class="text-success"><i class="fa fa-folder-open-o"></i>مرتبات تم دفعها</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="clearfix visible-sm"></div>
                            <div class="col-sm-6 col-md-3">
                                <div class="stat-item">
                                    <div class="stats">
                                        <div class="col-xs-8 count">
                                            @if(isset($TotalSalaries))
                                                <h1>{{$TotalSalaries}}</h1>
                                            @endif
                                            <p class="head_p">المرتبات الاجماليه</p>
                                        </div>
                                        <div class="col-xs-4 icon">
                                            <i class="fa fa-credit-card ex-icon"></i>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="status">
                                        <p class="text-ex"><i class="fa fa-money"></i>مجموع المرتبات الكليه لمدرسين الحضانة </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="section-divid"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 clear-padding-xs" style="margin-top: 30px;">
                            <div class="dashboard-stats">
                                <div class="col-md 12" style="overflow: hidden">
                                    <div class="col-md-4">
                                        <button class="btn btn-danger btn_in_details make_all_salary_get_0" data-toggle="modal" data-target="#make_all_salary_get_0">جعل كل الرواتب غير مدفوعه</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-danger btn_in_details remove_all_incu_teachers">مسح كل المدرسين</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-success btn_in_details make_all_salary_get_1" data-toggle="modal" data-target="#make_all_salary_get_1">جعل كل الرواتب مدفوعه</button>
                                    </div>
                                </div>
                                <div class="section-divid"></div>
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

        <!-- **********************************************************Edit details modal ********************************************************-->
        <div id="editDetailModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                @if(isset($teacher))
                {{ Form::open(array('url' => "teacher/$teacher->id" , 'method' => 'PUT', 'class'=> "updateIncuTeacherForm"))}}
                <input type="hidden" value="{{ csrf_token() }}" id="token">
            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i>تعديل بيانات المدرس</h4>
                    </div>
                    <div class="modal-body dash-form">
                        {!!Form::hidden('id','',['placeholder' => '','class' => 'T_id'])!!}
                        <div class="col-sm-3">
                            <label class="clear-top-margin"><i class="fa fa-credit-card"></i> المرتب </label>
                            {{ Form::number('salary','0',['placeholder' => '','class' => 'T_salary','tabindex'=>'4','min'=>'0','required']) }}
                        </div>
                        <div class="col-sm-3">
                            <label class="clear-top-margin"><i class="fa fa-phone"></i>التليفون</label>
                            {!! Form::text('phone','',['placeholder' =>'','class' => 'T_phone','required', 'maxlength'=>'11','tabindex'=>'3']) !!}
                        </div>
                        <div class="col-sm-3">
                            <label class="clear-top-margin"><i class="fa fa-venus"></i>النوع</label>
                            <select name="sex" tabindex="2" class="T_sex">
                                <option value="1">ذكر</option>
                                <option value="0">أنثى</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label class="clear-top-margin"><i class="fa fa-user"></i>الأسم</label>
                            {!!Form::text('name','',['placeholder' => '','class' => 'T_name', 'required', 'maxlength'=>'100','tabindex'=>'1'])!!}
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-3">
                            <label class=""><i class="fa fa-money"></i>هل تم دفع المرتب</label>
                            <select name="salary_get" tabindex="8" class="T_salary_get" required>
                                <option value="0">لا</option>
                                <option value="1">نعم</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label class=""><i class="fa fa-database"></i>تاريخ العمل</label>
                            {!!Form::date('work_date','',['placeholder' => '','class'=>'T_work_date','tabindex'=>'7','required'])!!}
                        </div>
                        <div class="col-sm-3">
                            <label><i class="fa fa-address-book"></i>العنوان #</label>
                            {!! Form::text('address','',['placeholder'=>'','class'=>'T_address', 'tabindex'=>'6']) !!}
                        </div>
                        @if(isset($incusubjects))
                            <div class="col-sm-3 multi_select">
                                <label><i class="fa fa-flag"></i>المواد التى يدرسها</label>
                                <select name="incusubjects[]" tabindex="5" multiple class="form-control framework T_incusubjects_id" required>
                                    @foreach($incusubjects as $incusubject)
                                        <option value="{{$incusubject->id}}">{{$incusubject->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <div class="clearfix"></div>
                            <div class="col-sm-6 text-center" style="margin-left: 180px;">
                                <label><i class="fa fa-address-book"></i>أسماء المواد التى يدرسها</label>
                                {!! Form::text('','',['placeholder'=>'','class'=>'T_incusubjects_name','disabled']) !!}
                            </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="modal-footer">
                        <div class="table-action-box">
                            {{Form::submit('حفظ',['id'=>"$teacher->id",'class'=>'button_submit','tabindex'=>'9'])}}
                            @endif
                            <a href="#" class="cancel" id="CancelUpdateForm" data-dismiss="modal" tabindex="10"><i
                                    class="fa fa-ban"></i>أغلاق</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- ***************************************************************Delete Modal ********************************************************-->
        <div id="deleteDetailModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <input type="hidden" value="{{ csrf_token() }}" id="token">
                        {!!Form::hidden('id','',['placeholder' => '','id' => 'DeleteIncuTeacher_Id'])!!}
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-trash"></i>حذف المدرس</h4>
                    </div>
                    <div class="modal-body">
                        <div class="table-action-box">
                            <a href="#" class="save Delete_Teacher_confirmed"><i class="fa fa-check"></i>حذف</a>
                            <a href="#" class="cancel Cancel_Delete_Form" data-dismiss="modal"><i class="fa fa-ban"></i>الغاء</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ***************************************************************Actions in Details Modal ********************************************************-->
        <div id="make_all_salary_get_0" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-trash"></i>هل تريد جعل كل المرتبات غير مدفوعه ؟</h4>
                    </div>
                    <div class="modal-body">
                        <div class="table-action-box">
                            <a href="#" class="save make_all_salary_get_0_confirmed"><i class="fa fa-check"></i>حسنا</a>
                            <a href="#" class="cancel Cancel_Form" data-dismiss="modal"><i class="fa fa-ban"></i>الغاء</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="make_all_salary_get_1" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-trash"></i>هل تريد جعل كل المرتبات مدفوعه ؟</h4>
                    </div>
                    <div class="modal-body">
                        <div class="table-action-box">
                            <a href="#" class="save make_all_salary_get_1_confirmed"><i class="fa fa-check"></i>حسنا</a>
                            <a href="#" class="cancel Cancel_Form" data-dismiss="modal"><i class="fa fa-ban"></i>الغاء</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
