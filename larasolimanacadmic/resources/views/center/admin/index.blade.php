@extends('layouts.main')

@section('content')
    <!-- MAIN CONTENT -->
    <div class="main-content" id="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <h5 class="page-title"><i class="fa fa-cogs"></i>كل المسؤولين</h5>
                    <div class="section-divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <div class="col-sm-8">
                        <div class="dash-item first-dash-item">
                            <h6 class="item-title"><i class="fa fa-sliders"></i>كل المسؤولين</h6>
                            <div class="inner-item">
                                <table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th><i class="fa fa-sliders"></i>ACTION</th>
                                        <th><i class="fa fa-cogs"></i>نوع المسؤل</th>
                                        <th><i class="fa fa-code"></i>ايميل المسؤل</th>
                                        <th><i class="fa fa-book"></i>أسم المسؤل</th>
                                        <th><i class=""></i>#</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($admins))
                                        @foreach($admins as $index => $admin)
                                    <tr>
                                        <td class="action-link">
                                            <a class="edit EditAdminButton" href="#" title="Edit" data-toggle="modal" data-target="#editDetailModal" data-id="{{$admin->id}}"><i class="fa fa-edit"></i></a>
                                            <a class="delete DeleteAdmin" href="#" title="Delete" data-toggle="modal" data-target="#deleteDetailModal" data-id="{{$admin->id}}"><i class="fa fa-remove"></i></a>
                                        </td>
                                        <td>{{ $admin->admin }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->name }}</td>
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
                            {!! Form::open(array('route' => 'admin.store', 'method' => 'post', 'id'=> 'addAdminForm'))!!}
                            <input type="hidden" value="{{ csrf_token() }}">
                            <h6 class="item-title"><i class="fa fa-plus-circle"></i>اضافة مسؤول</h6>
                            <div class="inner-item">
                                <div class="dash-form">
                                    <label class="clear-top-margin"><i class="fa fa-book"></i>الأسم</label>
                                    {!!Form::text('name','',['placeholder' => '','tabindex'=>'1','required','class'=>'Admin_name','maxlength'=>'20'])!!}
                                    <label><i class="fa fa-code"></i>الأيميل</label>
                                    {!!Form::email('email','',['placeholder' => '','tabindex'=>'2','required','class'=>'Admin_email','email'])!!}
                                    <label><i class="fa fa-key"></i>الباسورد</label>
                                    {!!Form::password('password',['placeholder' => '','tabindex'=>'3','required','class'=>'Admin_password','minlength'=>'6'])!!}
                                    <div>
                                        <button type="submit" class="btn submit_admin OutsideHref" tabindex="3"><a onclick="" class=""><i class="fa fa-paper-plane"></i> اضافة</a></button>
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
        <div id="deleteDetailModal" class="modal fade DeleteAdminConfirmation" role="dialog">
            <input type="hidden" name="id" id="id_of_admin">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-trash"></i>حذف المسؤول</h4>
                    </div>
                    <div class="modal-body">
                        <div class="table-action-box">
                            <a href="#" class="cancel ExitDeleteِAdminForm" data-dismiss="modal" style="float: right;"><i class="fa fa-ban"></i>اغلاق</a>
                            <a href="#" class="save" id="DeleteAdminConfirmed" style="float: right;"><i class="fa fa-check"></i>حذف</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        <!--Edit details modal-->
        <div id="editDetailModal" class="modal fade EditAdminForm" role="dialog">
            {{ Form::open(array('route' => 'admin.store', 'method' => 'PUT', 'id'=> 'EditAdminForm'))}}
            {{ method_field('PUT') }}
            <input type="hidden" value="{{ csrf_token() }}" id="token">
            {{ method_field('PUT') }}
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i>تعديل بيانات المسؤول</h4>
                    </div>
                    <input type="hidden" class="admin_id" name="id">
                    <div class="modal-body dash-form">
                        <div class="col-sm-6">
                            <label class="clear-top-margin"><i class="fa fa-key"></i>الباسورد</label>
                            <input type="password" placeholder="" value="" name="password" class="admin_password" tabindex="2" minlength="6"/>
                        </div>
                        <div class="col-sm-6">
                            <label class="clear-top-margin"><i class="fa fa-book"></i>الأسم</label>
                            <input type="text" placeholder="" value="" name="name" class="admin_name" required maxlength="30" tabindex="1"/>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-2"></div>
                        <div class="col-sm-8" style="margin-top: 20px;">
                            <label class="clear-top-margin"><i class="fa fa-code"></i>الأيميل</label>
                            <input type="email" placeholder="" value="" name="email" class="admin_email" tabindex="3" required />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="modal-footer">
                        <div class="table-action-box">
                            <button type="submit" class="btn UpdateAdmin OutsideHref"><a class="save ButtonSubmitEditedAdmin" tabindex="3"><i class="fa fa-check"></i>حفظ</a></button>
                            <a href="#" class="cancel ExitEditAdminForm" data-dismiss="modal" tabindex="4"><i class="fa fa-ban"></i>الغاء</a>
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>

    </div>



@endsection
