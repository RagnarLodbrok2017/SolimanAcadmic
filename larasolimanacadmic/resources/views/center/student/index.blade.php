@extends('layouts.main2')

@section('content')
    <!-- MAIN CONTENT -->
    <div class="main-content" id="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <h5 class="page-title"><i class="fa fa-users"></i>كل طلاب السنتر</h5>
                    <div class="section-divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <div class="col-lg-12">
                        <div class="dash-item first-dash-item">
                            <h6 class="item-title"><i class="fa fa-user"></i>الطلاب</h6>
                            <div class="inner-item">
                                <table id="attendenceDetailedTable"
                                       class="display responsive nowrap table-hover table-bordered" cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th class="text-center"><i class="fa fa-tasks"></i>ACTION</th>
                                        <th class="text-center"><i class="fa fa-credit-card"></i>المصاريف</th>
                                        <th class="text-center"><i class="fa fa-phone"></i>الموبيل</th>
                                        <th class="text-center"><i class="fa fa-book"></i>الفصل</th>
                                        <th class="text-center"><i class="fa fa-id-card"></i>المستوى</th>
                                        <th class="text-center"><i class="fa fa-user"></i>الأسم</th>
                                        <th class="text-center">#</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($students))
                                        {!! $num = 0 !!}
                                        @foreach($students  as $index => $student)
                                            <tr>
                                                <td class="action-link text-center">
                                                    <a class="delete DeleteIncuStudent" href="#" title="حذف"
                                                       data-toggle="modal" data-id="{{$student->id}}"
                                                       data-target="#deleteDetailModal"><i class="fa fa-remove"></i></a>
                                                    <a class="edit EditCenterStudent" href="#" title="تعديل"
                                                       data-toggle="modal" data-id="{{$student->id}}"
                                                       data-target="#editDetailModal">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    @if( $student->payment['price'] == 0)
                                                        <button type="button" class="btn btn-danger btn-outline"
                                                                style="width: 54px">{{$student->payment['price']}}</button>
                                                    @elseif($student->payment['price'] > 0 && $student->payment['price'] < 200)
                                                        <button type="button"
                                                                class="btn btn-outline btn-warning">{{$student->payment['price']}}</button>
                                                    @else
                                                        <button type="button"
                                                                class="btn btn-success btn-outline">{{$student->payment['price']}}</button>
                                                    @endif


                                                </td>
                                                <td class="text-center">{{ $student->phone }}</td>
                                                <td class="text-center"> {{ $student->classroom['name'] }} </td>
                                                <td class="text-center">{{ $student->stage->name }}</td>
                                                <td class="text-center">{{ $student->getFullNameAttribute() }}</td>
                                                <td class="text-center">{{ ++$num }}</td>
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
            <div class="container-fluid details_of_payment">
                <div class="row">
                    <div class="col-lg-12 clear-padding-xs">
                        <h4 class="page-title text-center"><i class="fa fa-book"></i>التفاصيل</h4>
                        <div class="dashboard-stats">
                            <div class="col-sm-6 col-md-3">
                                <div class="stat-item">
                                    <div class="stats">
                                        <div class="col-xs-8 count">
                                            @if(isset($Total_Payment))
                                                <h1>{{$Total_Payment}}</h1>
                                            @endif
                                            <p class="head_p">المصروفات الاجماليه</p>
                                        </div>
                                        <div class="col-xs-4 icon">
                                            <i class="fa fa-credit-card ex-icon"></i>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="status">
                                        <p class="text-ex"><i class="fa fa-credit-card"></i>المصروفات </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="stat-item">
                                    <div class="stats">
                                        <div class="col-xs-8 count">
                                            @if(isset($Total_Students_Payment_Zero))
                                                <h1>{{$Total_Students_Payment_Zero}}</h1>
                                            @endif
                                            <p class="head_p">عدد الطلاب لم يدفعوا</p>
                                        </div>
                                        <div class="col-xs-4 icon">
                                            <i class="fa fa-times-circle danger-icon"></i>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="status">
                                        <p class="text-danger"><i class="fa fa-exclamation-triangle"></i>لم يدفع
                                            المصاريف</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="stat-item">
                                    <div class="stats">
                                        <div class="col-xs-8 count">
                                            @if(isset($Total_Students_Payment_Not_Zero))
                                                <h1>{{$Total_Students_Payment_Not_Zero}}</h1>
                                            @endif
                                            <p class="head_p">عدد الطلاب دفعوا</p>
                                        </div>
                                        <div class="col-xs-4 icon">
                                            <i class="fa fa-check-circle success-icon"></i>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="status">
                                        <p class="text-success"><i class="fa fa-folder-open-o"></i>دفعوا المصاريف</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="clearfix visible-sm"></div>
                            <div class="col-sm-6 col-md-3">
                                <div class="stat-item">
                                    <div class="stats">
                                        <div class="col-xs-8 count">
                                            @if(isset($Total_Students_Parents_Dead))
                                                <h1>{{$Total_Students_Parents_Dead}}</h1>
                                            @endif
                                            <p class="head_p">عدد الطلاب الأيتام</p>
                                        </div>
                                        <div class="col-xs-4 icon">
                                            <i class="fa fa-flag look-icon"></i>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="status">
                                        <p class="text-look"><i class="fa fa-clock-o"></i>أيتام</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 clear-padding-xs" style="margin-top: 30px;">
                        <div class="dashboard-stats">
                            <div class="col-md 12" style="overflow: hidden">
                                <div class="col-md-4">
                                    <button class="btn btn-danger btn_in_details make_all_salary_get_0"
                                            data-toggle="modal" data-target="#changepaymentsgetto0centerstudent">جعل كل
                                        الرواتب غير مدفوعه
                                    </button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-danger btn_in_details remove_all_incu_teachers">مسح كل
                                        الطلاب
                                    </button>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-success btn_in_details make_all_salary_get_1"
                                            data-toggle="modal" data-target="#changepaymentsgetto1centerstudent">جعل كل
                                        الرواتب مدفوعه
                                    </button>
                                </div>
                            </div>
                            <div class="section-divid"></div>
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
                {{ Form::open(array('url' => "student/$student->id" , 'method' => 'PUT', 'class'=> "updateStudentForm"))}}
                <input type="hidden" value="{{ csrf_token() }}" id="token">
            {{--<input type="hidden" value="{{ $student->id }}" id="id" name="id">--}}
            {{--<input type="hidden" value="{{ $index }}" id="index" name="index">--}}
            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i>تعديل بيانات الطالب</h4>
                    </div>
                    <div class="modal-body dash-form">
                        {!!Form::hidden('id','',['placeholder' => '','id' => 'S_id'])!!}
                        {!!Form::hidden('payment_id','',['placeholder' => '','id' => 'S_payment'])!!}

                        <div class="col-sm-3">
                            <label class="clear-top-margin"><i class="fa fa-phone"></i>التليفون</label>
                            {!! Form::text('phone','',['placeholder' =>'','id' => 'S_phone','required', 'maxlength'=>'11','tabindex'=>'4']) !!}
                        </div>
                        <div class="col-sm-3">
                            <label class="clear-top-margin"><i class="fa fa-user"></i>اللقب</label>
                            {!!Form::text('last_name','',['placeholder' => '','id' => 'S_last_name','required', 'maxlength'=>'20','tabindex'=>'3'])!!}
                        </div>
                        <div class="col-sm-3">
                            <label class="clear-top-margin"><i class="fa fa-user"></i>الأسم الثانى</label>
                            {!!Form::text('middle_name','',['placeholder' => '','id' => 'S_middle_name','required', 'maxlength'=>'20','tabindex'=>'2'])!!}
                        </div>
                        <div class="col-sm-3">
                            <label class="clear-top-margin"><i class="fa fa-user"></i>الأسم الأول</label>
                            {!!Form::text('first_name','',['placeholder' => '','id' => 'S_first_name', 'required', 'maxlength'=>'20','tabindex'=>'1'])!!}
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-3">
                            <label><i class="fa fa-credit-card"></i>المبلغ المقدم</label>
                            {{ Form::number('payment_id','',['placeholder' => '','id' => 'Update_Payment','required', 'min' => '0','tabindex'=>'8']) }}
                        </div>
                        @if(isset($stages))
                            <div class="col-sm-3">
                                <label><i class="fa fa-flag"></i>المستوى</label>
                                <select name="stage_id" tabindex="5" id="S_stage">
                                    @foreach($stages as $stage)
                                        <option value="{{$stage->id}}">{{$stage->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <div class="col-sm-3">
                            <label><i class="fa fa-venus"></i>النوع</label>
                            <select name="sex" tabindex="4" id="S_sex">
                                <option value="1">ذكر</option>
                                <option value="0">أنثى</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label><i class="fa fa-address-book"></i>العنوان #</label>
                            {!! Form::text('address','',['placeholder'=>'','tabindex'=>'6','id'=>'S_address']) !!}
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="modal-footer">
                        <div class="table-action-box">
                            {{Form::submit('حفظ',['id'=>"$student->id",'class'=>'updateIncustudent button_submit','tabindex'=>'9'])}}
                            {{--<a href="#" class="save" id="updateIncustudent"><i class="fa fa-check"></i>حفظ</a>--}}
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
                        {!!Form::hidden('id','',['placeholder' => '','id' => 'Delete_Id'])!!}
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-trash"></i>حذف الطالب</h4>
                    </div>
                    <div class="modal-body">
                        <div class="table-action-box">
                            <a href="#" class="save Delete_Incustudent"><i class="fa fa-check"></i>حذف</a>
                            <a href="#" class="cancel Cancel_Delete_Form" data-dismiss="modal"><i class="fa fa-ban"></i>الغاء</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>


        <div id="changepaymentsgetto0centerstudent" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-trash"></i>هل تريد جعل كل المصاريف غير مدفوعه ؟</h4>
                    </div>
                    <div class="modal-body">
                        <div class="table-action-box">
                            <a href="#" class="save make_allCenterstudent_payments_get_0_confirmed"><i
                                    class="fa fa-check"></i>حسنا</a>
                            <a href="#" class="cancel Cancel_Form" data-dismiss="modal"><i
                                    class="fa fa-ban"></i>الغاء</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="changepaymentsgetto1centerstudent" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-trash"></i>هل تريد جعل كل المصاريف مدفوعه ؟</h4>
                    </div>
                    <div class="modal-body">
                        <div class="table-action-box">
                            <a href="#" class="save make_allCenterstudent_payments_get_1_confirmed"><i
                                    class="fa fa-check"></i>حسنا</a>
                            <a href="#" class="cancel Cancel_Form" data-dismiss="modal"><i
                                    class="fa fa-ban"></i>الغاء</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
