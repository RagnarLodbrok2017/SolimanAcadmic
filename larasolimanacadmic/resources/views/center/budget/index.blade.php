@extends('layouts.main')

@section('content')
    <!-- MAIN CONTENT -->
    <div class="main-content" id="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <h5 class="page-title"><i class="fa fa-clock-o"></i>كل المصاريف</h5>
                    <div class="section-divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <div class="col-sm-12">
                        {!! Form::open(array('url'=>'budget','method'=>'post','id'=>'PostBudget')) !!}
                        <div class="dash-item first-dash-item">
                            <h6 class="item-title"><i class="fa fa-plus-circle"></i>اضافة فاتورة</h6>
                            <div class="inner-item">
                                <div class="dash-form">
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-code"></i>الموضوع</label>
                                        <textarea name="description" tabindex="4" class="budgetDes"></textarea>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-clock-o"></i>مصروف فى</label>
                                        <select name="type_id" tabindex="3" class="budgetType" required>
                                            @if(isset($types))
                                                @foreach($types as $type)
                                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-book"></i>القيمة</label>
                                        <input type="number" class="budgetSalary" min="0" name="salary"
                                               required="required" tabindex="2">
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="clear-top-margin"><i class="fa fa-calendar"></i>اليوم</label>
                                        <select name="day" tabindex="1" class="budgetDay" required>
                                            <option>السبت</option>
                                            <option>الأحد</option>
                                            <option>الأثنين</option>
                                            <option>الثلاثاء</option>
                                            <option>الأربعاء</option>
                                            <option>الخميس</option>
                                            <option>الجمعه</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn OutsideHref SubmitPostBudget" tabindex="5">
                                            <a><i class="fa fa-paper-plane"></i> حفظ</a></button>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-sm-12">
                        <div class="dash-item">
                            <h6 class="item-title"><i class="fa fa-sliders"></i>كل الفواتير والمصروفات</h6>
                            <div class="inner-item">
                                <table id="attendenceDetailedTable" class="display responsive nowrap BudgetTable"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th><i class="fa fa-sliders"></i>التعديلات</th>
                                        <th><i class="fa fa-cogs"></i>الوصف</th>
                                        <th><i class="fa fa-home"></i>المكان</th>
                                        <th><i class="fa fa-credit-card"></i>القيمة بالجنيه</th>
                                        <th><i class="fa fa-clock-o"></i>التاريخ</th>
                                        <th><i class="fa fa-user"></i>الأدمن</th>
                                        <th><i class="fa fa-calendar"></i>اليوم</th>
                                        <th><i class="fa"></i>#</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($budgets))
                                        @foreach($budgets as $index => $budget)
                                            <tr>
                                                <td class="action-link">
                                                    <a class="edit EditBudgetButton" href="#" title="Edit" data-toggle="modal"
                                                       data-target="#editDetailModal" data-id="{{$budget->id}}"><i
                                                            class="fa fa-edit"></i></a>
                                                    <a class="delete DeleteButtonOfBudget" href="#" title="Delete"
                                                       data-toggle="modal" data-target="#deleteDetailModal"
                                                       data-id="{{$budget->id}}"><i class="fa fa-remove"></i></a>
                                                </td>
                                                <td>{{$budget->description}}</td>
                                                <td>{{ $budget->type->name }}</td>
                                                <td>{{ $budget->salary }}</td>
                                                <td>{{$budget->created_at}}</td>
                                                <td>{{$budget->user['name']}}</td>
                                                <td>{{$budget->day}}</td>
                                                <td>{{$index+1}}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid details_of_any">
                        <div class="row">
                            <div class="col-lg-12 clear-padding-xs">
                                <h3 class="page-title text-center" style="margin-top: 40px"><i class="fa fa-book"></i>التفاصيل</h3>
                                <div class="dashboard-stats">
                                    <div class="col-sm-6 col-md-3">
                                        <div class="stat-item">
                                            <div class="stats">
                                                <div class="col-xs-8 count">
                                                    @if(isset($Total_Budgets_Salary))
                                                        <h1>{{$Total_Budgets_Salary}}</h1>
                                                    @endif
                                                    <p class="head_p">المصروفات الاجماليه</p>
                                                </div>
                                                <div class="col-xs-4 icon">
                                                    <i class="fa fa-credit-card ex-icon"></i>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="status">
                                                @if(isset($Total_Budgets_Count))
                                                    <pre class="text"><i class=""></i>عدد المصاريف الكليه  <strong>{{$Total_Budgets_Count}}</strong></pre>
                                                @endif
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="stat-item">
                                            <div class="stats">
                                                <div class="col-xs-8 count">
                                                    @if(isset($Total_Budget_Salary_Type1))
                                                        <h1>{{$Total_Budget_Salary_Type1}}</h1>
                                                    @endif
                                                    <p class="head_p">مصاريف الحضانة</p>
                                                </div>
                                                <div class="col-xs-4 icon">
                                                    <i class="fa fa-credit-card ex-icon"></i>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="status">
                                                @if(isset($Total_Budget_Count_Type1))
                                                    <pre class="text"><i class=""></i>عدد مصاريف الحضانة  <strong>{{$Total_Budget_Count_Type1}}</strong></pre>
                                                @endif
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="stat-item">
                                            <div class="stats">
                                                <div class="col-xs-8 count">
                                                    @if(isset($Total_Budget_Salary_Type2))
                                                        <h1>{{$Total_Budget_Salary_Type2}}</h1>
                                                    @endif
                                                    <p class="head_p">مصاريف التقويه</p>
                                                </div>
                                                <div class="col-xs-4 icon">
                                                    <i class="fa fa-credit-card ex-icon"></i>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="status">
                                                @if(isset($Total_Budget_Count_Type2))
                                                    <pre class="text"><i class=""></i>عدد مصاريف التقويه  <strong>{{$Total_Budget_Count_Type2}}</strong></pre>
                                                @endif
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="clearfix visible-sm"></div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="stat-item">
                                            <div class="stats">
                                                <div class="col-xs-8 count">
                                                    @if(isset($Total_Budget_Salary_Type3))
                                                        <h1>{{$Total_Budget_Salary_Type3}}</h1>
                                                    @endif
                                                    <p class="head_p">مصاريف التحفيظ</p>
                                                </div>
                                                <div class="col-xs-4 icon">
                                                    <i class="fa fa-credit-card ex-icon"></i>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="status">
                                                @if(isset($Total_Budget_Count_Type3))
                                                    <pre class="text"><i class=""></i>عدد مصاريف التحفيظ  <strong>{{$Total_Budget_Count_Type3}}</strong></pre>
                                                @endif
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="section-divid"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 clear-padding-xs">
                                    <div class="dashboard-stats">
                                        <div class="col-sm-6 col-md-3">
                                            <div class="stat-item">
                                                <div class="stats">
                                                    <div class="col-xs-8 count">
                                                        @if(isset($Total_Budget_Salary_Type4))
                                                            <h1>{{$Total_Budget_Salary_Type4}}</h1>
                                                        @endif
                                                        <p class="head_p">مصاريف الاستضافة</p>
                                                    </div>
                                                    <div class="col-xs-4 icon">
                                                        <i class="fa fa-credit-card ex-icon"></i>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="status">
                                                    @if(isset($Total_Budget_Count_Type4))
                                                        <pre class="text"><i class=""></i>عدد مصاريف الاستضافة  <strong>{{$Total_Budget_Count_Type4}}</strong></pre>
                                                    @endif
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <div class="stat-item">
                                                <div class="stats">
                                                    <div class="col-xs-8 count">
                                                        @if(isset($Total_Budget_Salary_Type5))
                                                            <h1>{{$Total_Budget_Salary_Type5}}</h1>
                                                        @endif
                                                        <p class="head_p">مصاريف أخرى</p>
                                                    </div>
                                                    <div class="col-xs-4 icon">
                                                        <i class="fa fa-credit-card ex-icon"></i>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="status">
                                                    @if(isset($Total_Budget_Count_Type5))
                                                        <pre class="text"><i class=""></i>عدد المصاريف الأخرى  <strong>{{$Total_Budget_Count_Type5}}</strong></pre>
                                                    @endif
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="section-divid"></div>
                                    </div>
                                </div>
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
            <p>Copyright Ahmed R. Mohamed</p>
        </div>

        <!-- Delete Modal -->
        <div id="deleteDetailModal" class="modal fade DeleteBudgetForm" role="dialog">
            <div class="modal-dialog">
                <input type="hidden" name="id" class="Budget_id">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-trash"></i>حذف فاتورة أو مصاريف</h4>
                    </div>
                    <div class="modal-body">
                        <div class="table-action-box">
                            <a href="#" class="save DeleteBudgetConfirmation"><i class="fa fa-check"></i>تأكيد الحذف</a>
                            <a href="#" class="cancel CancelDeleteOfBudget" data-dismiss="modal"><i
                                    class="fa fa-ban"></i>اغلاق</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        <!--Edit details modal-->
        <div id="editDetailModal" class="modal fade EditBudgetForm" role="dialog">
            {!! Form::open(array('url'=>'budget','method'=>'post','id'=>'UpdateBudget')) !!}
            <input type="hidden" name="id" class="Budget_Id">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i>تعديل بيانات الفاتورة والمصاريف</h4>
                    </div>
                    <div class="modal-body dash-form">
                        <div class="col-sm-4">
                            <label class="clear-top-margin"><i class="fa fa-home"></i>مصروف فى</label>
                            <select name="type_id" tabindex="3" class="Budget_Type">
                                @if(isset($types))
                                    @foreach($types as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label class="clear-top-margin"><i class="fa fa-credit-card"></i>القيمة</label>
                            <input type="number" value="" class="Budget_Salary" min="0" tabindex="2"/>
                        </div>
                        <div class="col-sm-4">
                            <label class="clear-top-margin"><i class="fa fa-calendar"></i>اليوم</label>
                            <input type="text" value="" class="Budget_Day" disabled="disabled" tabindex="1">
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-12">
                            <label><i class="fa fa-info-code"></i>الموضوع</label>
                            <textarea class="Budget_Description" tabindex="4" style="text-align: right"></textarea>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="modal-footer">
                        <div class="table-action-box">
                            <button class="btn OutsideHref ButtonSubmitEditedBudget" type="submit"><a href="#" class="save"><i class="fa fa-check"></i>تعديل</a></button>
                            <a href="#" class="cancel ExitEditBudgetButton" data-dismiss="modal"><i class="fa fa-ban"></i>اغلاق</a>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
