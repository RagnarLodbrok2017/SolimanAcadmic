@extends('layouts.main')

@section('content')
    <!-- MAIN CONTENT -->
    <div class="main-content" id="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <h5 class="page-title"><i class="fa fa-cogs"></i>كل المواد</h5>
                    <div class="section-divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <div class="col-sm-8">
                        <div class="dash-item first-dash-item">
                            <h6 class="item-title"><i class="fa fa-sliders"></i>كل مواد السنتر</h6>
                            <div class="inner-item">
                                <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th><i class="fa fa-sliders"></i>ACTION</th>
                                        <th><i class="fa fa-cogs"></i>حالة المادة</th>
                                        <th><i class="fa fa-code"></i>كود المادة</th>
                                        <th><i class="fa fa-book"></i>أسم المادة</th>
                                        <th><i class=""></i>#</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($Incu_Subjects))
                                        @foreach($Incu_Subjects as $index => $subject)
                                    <tr>
                                        <td class="action-link">
                                            <a class="edit EditIncuSubjectButton" href="#" title="Edit" data-toggle="modal" data-target="#editDetailModal" data-id="{{$subject->id}}"><i class="fa fa-edit"></i></a>
                                            <a class="delete DeleteIncuSubject" href="#" title="Delete" data-toggle="modal" data-target="#deleteDetailModal" data-id="{{$subject->id}}"><i class="fa fa-remove"></i></a>
                                        </td>
                                        <td> <button class="btn btn-success" disabled="disabled">متاحة</button></td>
                                        <td>{{ $subject->code }}</td>
                                        <td>{{ $subject->name }}</td>
                                        <td>{{ $index+1 }}</td>
                                    </tr>
                                    @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="dash-item first-dash-item">
                            {!! Form::open(array('route' => 'incusubject.store', 'method' => 'post', 'id'=> 'addIncusubjectForm'))!!}
                            <input type="hidden" value="{{ csrf_token() }}" id="token">
                            <h6 class="item-title"><i class="fa fa-plus-circle"></i> اضافة مادة</h6>
                            <div class="inner-item">
                                <div class="dash-form">
                                    <label class="clear-top-margin"><i class="fa fa-book"></i>الأسم</label>
                                    {!!Form::text('name','',['placeholder' => '','tabindex'=>'1','required','class'=>'Subject_name','maxlength'=>'20'])!!}
                                    <label><i class="fa fa-code"></i>كود المادة</label>
                                    {!!Form::text('code','',['placeholder' => '','tabindex'=>'2','class'=>'Subject_code'])!!}
                                    <div>
                                        <button type="submit" class="btn submit_incusubject" tabindex="3"><a onclick="" class="noMargin"><i class="fa fa-paper-plane"></i> اضافة</a></button>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                            {!! Form::close() !!}
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
        <div id="deleteDetailModal" class="modal fade DeleteIncu_SubjectConfirmation" role="dialog">
            <input type="hidden" name="id" id="id_of_subject">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-trash"></i>حذف المادة</h4>
                    </div>
                    <div class="modal-body">
                        <div class="table-action-box">
                            <a href="#" class="cancel ExitDeleteIncusubjectForm" data-dismiss="modal" style="float: right;"><i class="fa fa-ban"></i>اغلاق</a>
                            <a href="#" class="save" id="DeleteIncusubjectConfirmed" style="float: right;"><i class="fa fa-check"></i>حذف</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        <!--Edit details modal-->
        <div id="editDetailModal" class="modal fade EditIncuSubjectForm" role="dialog">
            {{ Form::open(array('route' => 'incustudent.store', 'method' => 'PUT', 'id'=> 'EditSubjectForm'))}}
            {{ method_field('PUT') }}
            <input type="hidden" value="{{ csrf_token() }}" id="token">
            {{ method_field('PUT') }}
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i>تعديل بيانات المادة</h4>
                    </div>
                    <input type="hidden" class="IncuSubject_id" name="id">
                    <div class="modal-body dash-form">
                        <div class="col-sm-6">
                            <label class="clear-top-margin"><i class="fa fa-code"></i>الكود</label>
                            <input type="text" placeholder="الكود" value="" name="code" class="IncuSubject_code" tabindex="1" />
                        </div>
                        <div class="col-sm-6">
                            <label class="clear-top-margin"><i class="fa fa-book"></i>الأسم</label>
                            <input type="text" placeholder="الأسم" value="" name="name" class="IncuSubject_name" required maxlength="20" tabindex="2"/>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="modal-footer">
                        <div class="table-action-box">
                            <button type="submit" class="btn UpdateIncuSubject"><a class="save ButtonSubmitEditedIncuSubject" tabindex="3"><i class="fa fa-check"></i>حفظ</a></button>
                            <a href="#" class="cancel ExitIncuSubject" data-dismiss="modal" tabindex="4"><i class="fa fa-ban"></i>الغاء</a>
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>

    </div>



@endsection
