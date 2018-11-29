$(document).ready(function () {
    "use strict";
    //multiselect bootstrap
    $('.framework').multiselect({
        nonSelectedText: 'أختار',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth: '100%'
    });
    /* ************************************** Incu Student Operations***************************** */
    // function validator() {
    $("#addIncustudentForm").validate({
        rules: {
            first_name: {
                required: true,
                maxlength: 15,
            },
            middle_name: {
                required: true,
                maxlength: 15,
            },
            last_name: {
                required: true,
                maxlength: 15,
            },
            sex: "required",
            dob: "required",
            status: "required",
            payment: "required",
            classroom_id: "required",
            level_id: "required",
            shift_id: "required",
            phone: {
                required: true,
                number: true,
                maxlength: 11,
                minlength: 11,
            },
            address: {
                required: true,
                maxlength: 50,
            },
            //parents Information
            father_name: {
                maxlength: 15,
            },
            mother_name: {
                maxlength: 15,
            },
            FPhone: {
                number: true,
                maxlength: 11,
                minlength: 11,
            },
            LPhone: {
                number: true,
                maxlength: 11,
                minlength: 11,
            },
            job: {
                maxlength: 25,
            },
            email: {
                maxlength: 40,
                email: true,
            },
        },
        debug: true,
        submitHandler: function (form) {
            $(form).ajaxSubmit({
                success: function () {
                    $('#message_lara').css('display', 'block');
                    setTimeout(function () {
                        $('#message_lara').css('display', 'none');
                    }, 2000);
                }
            });
            var formid = $("#addIncustudentForm");
            var FormV = formid.validate();
            FormV.resetForm();
        },
        success: function () {
        }
    });


    // ************ Update Form Of Incustudent new 23/9/2018
    $(".EditUpdate").on('click', function () {
        let id = $(this).data('id');
        // var url = '{{URL::to('getUpdate')}}',
        // var url = "{{ route("getUpdate") }}";
        $.ajax({
            type: 'get',
            url: 'getUpdate',
            data: {
                'id': id
            },
            success: function (data) {
                $("#S_id").val(data.Update_Student.id);
                $("#S_payment").val(data.Update_Payment.id);
                $("#S_first_name").val(data.Update_Student.first_name);
                $("#S_middle_name").val(data.Update_Student.middle_name);
                $("#S_last_name").val(data.Update_Student.last_name);
                $("#S_phone").val(data.Update_Student.phone);
                $("#Update_Classes").val(data.Update_Student.classroom_id);
                $("#Update_Statuses").val(data.Update_Student.status_id);
                $("#Update_Shifts").val(data.Update_Student.shift_id);
                $("#Update_Payment").val(data.Update_Payment.price);
                // $.each(data.Update_Classes,function(index,val){
                //     $('#Update_Classes').append($("<option></option>").attr("value",val.id).text(val.name));
                // });
            }

        });
    });
    // Send Updated Information to controller
    $('#updateIncustudentForm').on('submit', function (e) {
        e.preventDefault();
        var id = $("#S_id").val();
        var payment_id = $("#S_payment").val();
        var first_name = $("#S_first_name").val();
        var middle_name = $("#S_middle_name").val();
        var last_name = $("#S_last_name").val();
        var status_id = $("#Update_Statuses").val();
        var phone = $("#S_phone").val();
        var payment = $("#Update_Payment").val();
        var classroom_id = $("#Update_Classes").val();
        var shift_id = $("#Update_Shifts").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/newUpdate',
            data: {
                id: id,
                payment_id: payment_id,
                first_name: first_name,
                middle_name: middle_name,
                last_name: last_name,
                phone: phone,
                payment: payment,
                classroom_id: classroom_id,
                shift_id: shift_id,
                status_id: status_id,
            },
            async: true,
            //notification
            success: function (data) {
                var message = ' ' + data.first_name + ' ' + data.middle_name + ' ' + data.last_name + "<br> تم تعديله بنجاح";
                setTimeout(function () {
                    $.bootstrapGrowl(message, {
                        type: 'success',
                        align: 'right',
                        stackup_spacing: 30
                    });
                }, 1000);
                $('#CancelUpdateForm').click();
                $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
            }
        });
    });


    // ***** Delete Form of Incustudent 24/9 ********
    //Button delete in all students table
    $('.DeleteIncuStudent').on('click', function (e) {
        e.preventDefault();
        let Incustudent_id = $(this).data('id');
        $('#deleteDetailModal #Delete_Id').val(Incustudent_id);
    });

    $('#deleteDetailModal .Delete_Incustudent').on('click', function (e) {
        e.preventDefault();
        let id = $('#deleteDetailModal #Delete_Id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'DELETE',
            dataType: 'json',
            url: 'incustudent/' + id,
            data: {
                'id': id,
                // _method: 'DELETE',
                // _token: "{{ csrf_token() }}"
            },
            async: true,
            success: function (data) {
                $('.Cancel_Delete_Form').click();
                var message = ' ' + data.first_name + ' ' + data.middle_name + ' ' + data.last_name + "<br> تم حذفه بنجاح";
                setTimeout(function () {
                    $.bootstrapGrowl(message, {
                        type: 'danger',
                        align: 'right',
                        stackup_spacing: 30
                    });
                }, 1000);
                $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
            },
            fail: function (error) {
                console.log(error);
            }
        });
    });

    // Actions on Incustudents
    $('#changepaymentsgetto0incustudent .make_allIncustudent_payments_get_0_confirmed').on('click', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: '/changepaymentsgetto0incustudent',
            data: {
                'action': 0,
            },
            async: true,
            success: function (data) {
                $('.Cancel_Form').click();
                var message = "تم جعل كل المصروفات غير مدفوعه";
                setTimeout(function () {
                    $.bootstrapGrowl(message, {
                        type: 'success',
                        align: 'right',
                        stackup_spacing: 30
                    });
                }, 1000);
                $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
            },
            fail: function (error) {
                var message = "عذرا هناك مشكله من فضلك اعد تحميل الصفحه";
                setTimeout(function () {
                    $.bootstrapGrowl(message, {
                        type: 'danger',
                        align: 'right',
                        stackup_spacing: 30
                    });
                }, 1000);
            }
        });
    });
    $('#changepaymentsgetto1incustudent .make_allIncustudent_payments_get_1_confirmed').on('click', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: '/changepaymentsgetto1incustudent',
            data: {
                'action': 1,
            },
            success: function (data) {
                $('#changesalarygetto1stuff .Cancel_Form').click();
                var message = "تم جعل كل المصروفات مدفوعه";
                setTimeout(function (data) {
                    $.bootstrapGrowl(message, {
                        type: 'success',
                        align: 'right',
                        stackup_spacing: 30
                    });
                }, 1000);
                $('.Cancel_Form').click();
                $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
            },
            fail: function (error) {
                var message = "عذرا هناك مشكله من فضلك اعد تحميل الصفحه";
                setTimeout(function () {
                    $.bootstrapGrowl(message, {
                        type: 'danger',
                        align: 'right',
                        stackup_spacing: 30
                    });
                }, 1000);
            }
        });
    });

    /* ******************************************* Add The Incu Subject 25/9  ************************************************************** */
    $('.submit_incusubject').on('click', function (e) {
        e.preventDefault();
        var name = $('.Subject_name').val();
        var code = $('.Subject_code').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: 'incusubject',
            data: {'name': name, 'code': code},
            async: true,
            success: function (data) {
                var message = ' ' + data.name + ' ' + data.code + "<br> تم اضافتها بنجاح";
                setTimeout(function () {
                    $.bootstrapGrowl(message, {
                        type: 'success',
                        align: 'right',
                        stackup_spacing: 30
                    });
                }, 1000);
                $("#addIncusubjectForm")[0].reset();
                $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
            },
            error: function () {
                setTimeout(function () {
                    $.bootstrapGrowl('The Subject Cannot Added !', {
                        type: 'danger',
                        align: 'right',
                        stackup_spacing: 30
                    });
                }, 500);
            }

        });
    });

    //*********** Delete Incu Subject *******************
    $(".DeleteIncuSubject").on('click', function () {
        let Subject_id = $(this).data('id');
        $('.DeleteIncu_SubjectConfirmation #id_of_subject').val(Subject_id);
    });
    $('#DeleteIncusubjectConfirmed').on('click', function (e) {
        e.preventDefault();
        let id = $('#id_of_subject').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'DELETE',
            dataType: 'json',
            url: 'incusubject/' + id,
            data: {'id': id},
            success: function (data) {
                var message = ' ' + data.name + ' ' + data.code + "<br> تم مسح المادة بنجاح";
                setTimeout(function () {
                    $.bootstrapGrowl(message, {
                        type: 'success',
                        align: 'right',
                        stackup_spacing: 30
                    });
                }, 1000);
                $('.ExitDeleteIncusubjectForm').click();
                $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
            },
            error: function () {
                setTimeout(function () {
                    $.bootstrapGrowl('المادة لا يمكن مسحها !', {
                        type: 'danger',
                        align: 'right',
                        stackup_spacing: 30
                    });
                }, 500);
            }
        });
    });

    /* Edit Incu Subject */
    $('.EditIncuSubjectButton').on('click', function () {
        let id = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: 'incusubject/' + id + '/edit',
            data: {'id': id},
            success: function (data) {
                $('.EditIncuSubjectForm .IncuSubject_id').val(id);
                $('.EditIncuSubjectForm .IncuSubject_code').val(data.code);
                $('.EditIncuSubjectForm .IncuSubject_name').val(data.name);
            }
        });
    });
    $('.ButtonSubmitEditedIncuSubject').on('click', function (e) {
        e.preventDefault();
        let id = $('.EditIncuSubjectForm .IncuSubject_id').val();
        let name = $('.EditIncuSubjectForm .IncuSubject_name').val();
        let code = $('.EditIncuSubjectForm .IncuSubject_code').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: 'POST',
            url: '/newUpdateSubject',
            data: {
                'id': id,
                'name': name,
                'code': code,
            },
            success: function (data) {
                $('.ExitIncuSubject').click();
                var message = ' ' + data.name + ' ' + data.code + "<br> تم تعديل المادة بنجاح لقبول اى تعديل قم باعادة تحميل الصفحة";
                setTimeout(function () {
                    $.bootstrapGrowl(message, {
                        type: 'success',
                        align: 'right',
                        stackup_spacing: 30
                    });
                }, 1000);
                $('.ExitDeleteIncusubjectForm').click();
                $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
            },
            error: function () {
                setTimeout(function () {
                    $.bootstrapGrowl('المادة لا يمكن تعديلها من فضلك قم باعادة تحميل الصفحة !', {
                        type: 'danger',
                        align: 'right',
                        stackup_spacing: 30
                    });
                }, 500);
            }
        });
    });


    /* *******************************************************  Add The Budget 27/9  **************************************************************** */
    $('.SubmitPostBudget').on('click', function (e) {
        e.preventDefault();
        var salary = $('.budgetSalary').val();
        var type_id = $('.budgetType').val();
        var day = $('.budgetDay').val();
        var description = $('.budgetDes').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: 'budget',
            data: {'salary': salary, 'type_id': type_id, 'day': day, 'description': description},
            async: true,
            success: function (data) {
                var message = 'تم اضافة الفاتورة شكرا لك';
                setTimeout(function () {
                    $.bootstrapGrowl(message, {
                        type: 'success',
                        align: 'right',
                        stackup_spacing: 30
                    });
                }, 1000);
                $("#PostBudget")[0].reset();
                $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
            },
            error: function () {
                setTimeout(function () {
                    $.bootstrapGrowl('لا يمكن اضافة الفاتورة', {
                        type: 'danger',
                        align: 'right',
                        stackup_spacing: 30
                    });
                }, 500);
            }

        });
    });
    //Delete Budget
    $(".DeleteButtonOfBudget").on('click', function () {
        let Budget_id = $(this).data('id');
        $('.DeleteBudgetForm .Budget_id').val(Budget_id);
    });
    $('.DeleteBudgetConfirmation').on('click', function (e) {
        e.preventDefault();
        let id = $('.DeleteBudgetForm .Budget_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'DELETE',
            dataType: 'json',
            url: 'budget/' + id,
            data: {'id': id},
            success: function (data) {
                var message = 'تم مسح الفاتورة بنجاح';
                setTimeout(function () {
                    $.bootstrapGrowl(message, {
                        type: 'success',
                        align: 'right',
                        stackup_spacing: 30
                    });
                }, 1000);
                $('.CancelDeleteOfBudget').click();
                $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
            },
            error: function () {
                setTimeout(function () {
                    $.bootstrapGrowl('المادة لا يمكن مسحها !', {
                        type: 'danger',
                        align: 'right',
                        stackup_spacing: 30
                    });
                }, 500);
            }
        });
    });
    //Edit Budget
    $('.EditBudgetButton').on('click', function () {
        let id = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: 'budget/' + id + '/edit',
            data: {'id': id},
            success: function (data) {
                $('.EditBudgetForm .Budget_Id').val(id);
                $('.EditBudgetForm .Budget_Type').val(data.type_id);
                $('.EditBudgetForm .Budget_Salary').val(data.salary);
                $('.EditBudgetForm .Budget_Description').val(data.description);
                $('.EditBudgetForm .Budget_Day').val(data.day);
                console.log(data);
            }
        });
    });
    $('.ButtonSubmitEditedBudget').on('click', function (e) {
        e.preventDefault();
        let id = $('.EditBudgetForm .Budget_Id').val();
        let type_id = $('.EditBudgetForm .Budget_Type').val();
        let salary = $('.EditBudgetForm .Budget_Salary').val();
        let description = $('.EditBudgetForm .Budget_Description').val();
        let day = $('.EditBudgetForm .Budget_Day').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: 'POST',
            url: '/updatebudget',
            data: {
                'id': id,
                'type_id': type_id,
                'salary': salary,
                'description': description,
                'day': day,
            },
            success: function (data) {
                var message = "<br> تم تعديل الفاتورة بنجاح لقبول اى تعديل قم باعادة تحميل الصفحة";
                setTimeout(function () {
                    $.bootstrapGrowl(message, {
                        type: 'success',
                        align: 'right',
                        stackup_spacing: 30
                    });
                }, 1000);
                $('.ExitEditBudgetButton').click();
                $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
            },
            error: function () {
                setTimeout(function () {
                    $.bootstrapGrowl('الفاتورة لا يمكن تعديلها من فضلك قم باعادة تحميل الصفحة !', {
                        type: 'danger',
                        align: 'right',
                        stackup_spacing: 30
                    });
                }, 500);
            }
        });
    });


});
/* ************************************************* Incu teacher  *********************************************** */
//Incu Teacher add
$("#addIncuTeacherForm").validate({
    rules: {
        name: {
            required: true,
            maxlength: 100,
            minlength: 10,
        },
        address: {
            maxlength: 100,
        },
        sex: "required",
        salary: "required",
        salary_get: "required",
        work_date: "required",
        phone: {
            required: true,
            number: true,
            maxlength: 11,
            minlength: 11,
        },
    },
    debug: true,
    submitHandler: function (form) {
        $(form).ajaxSubmit({
            success: function () {
                var message = "<br>تم اضاة المدرس بنجاح    ";
                setTimeout(function () {
                    $.bootstrapGrowl(message, {
                        type: 'success',
                        align: 'right',
                        stackup_spacing: 30
                    });
                }, 1000);
            }
        });
        var formid = $("#addIncuTeacherForm");
        var FormV = formid.validate();
        FormV.resetForm();
    },
    success: function () {
    }
});

//Button delete in all teachers table
$('.DeleteIncuTeacher').on('click', function (e) {
    e.preventDefault();
    let IncuTeacher_id = $(this).data('id');
    $('#deleteDetailModal #DeleteIncuTeacher_Id').val(IncuTeacher_id);
});

$('#deleteDetailModal .Delete_Teacher_confirmed').on('click', function (e) {
    e.preventDefault();
    let id = $('#deleteDetailModal #DeleteIncuTeacher_Id').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'DELETE',
        dataType: 'json',
        url: 'teacher/' + id,
        data: {
            'id': id,
        },
        async: true,
        success: function (data) {
            $('.Cancel_Delete_Form').click();
            var message = ' ' + data.name + ' ' + "<br> تم حذفه بنجاح";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'success',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
            $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
        },
        fail: function (error) {
            var message = "عذرا لم يتم حذفه";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'danger',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
        }
    });
});

// Update of the Teacher
// ************ Update Form Of Incuteacher new 3/10/2018
$(".EditIncuTeacherUpdate").on('click', function () {
    let id = $(this).data('id');
    $.ajax({
        type: 'get',
        url: 'getUpdateIncuTeacher',
        data: {
            'id': id
        },
        success: function (data) {
            $(".T_id").val(data.Update_Teacher.id);
            $(".T_name").val(data.Update_Teacher.name);
            $(".T_phone").val(data.Update_Teacher.phone);
            $(".T_salary").val(data.Update_Teacher.salary);
            $(".T_salary_get").val(data.Update_Teacher.salary_get);
            $(".T_address").val(data.Update_Teacher.address);
            $(".T_sex").val(data.Update_Teacher.sex);
            $(".T_work_date").val(data.Update_Teacher.work_date);
            $(".T_incusubjects_id").val(data.T_incusubjects_id);
            $(".T_incusubjects_name").val(data.T_incusubjects_name);
        }
    });
});
// Send Updated Information to controller
$('.updateIncuTeacherForm').on('submit', function (e) {
    e.preventDefault();
    var id = $(".T_id").val();
    var name = $(".T_name").val();
    var phone = $(".T_phone").val();
    var salary = $(".T_salary").val();
    var salary_get = $(".T_salary_get").val();
    var address = $(".T_address").val();
    var sex = $(".T_sex").val();
    var work_date = $(".T_work_date").val();
    var incusubjects = $(".T_incusubjects_id").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '/newUpdateIncuTeacher',
        data: {
            id: id,
            name: name,
            phone: phone,
            salary: salary,
            salary_get: salary_get,
            address: address,
            sex: sex,
            work_date: work_date,
            incusubjects: incusubjects,
        },
        async: true,
        //notification
        success: function (data) {
            var message = ' ' + data.name + "<br> تم تعديله بنجاح";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'success',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
            $('#CancelUpdateForm').click();
            $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
        }
    });
});

/* Actions in Incu Teachers Details */
$('#make_all_salary_get_0 .make_all_salary_get_0_confirmed').on('click', function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: '/changesalarygetto0',
        data: {
            'action': 0,
        },
        async: true,
        success: function (data) {
            $('.Cancel_Form').click();
            var message = "تم جعل كل المرتبات غير مدفوعه";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'success',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
            $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
        },
        fail: function (error) {
            var message = "عذرا هناك مشكله من فضلك اعد تحميل الصفحه";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'danger',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
        }
    });
});
$('#make_all_salary_get_1 .make_all_salary_get_1_confirmed').on('click', function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: '/changesalarygetto1',
        data: {
            'action': 1,
        },
        success: function (data) {
            $('#make_all_salary_get_1 .Cancel_Form').click();
            var message = "تم جعل كل المرتبات مدفوعه";
            setTimeout(function (data) {
                $.bootstrapGrowl(message, {
                    type: 'success',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
            $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
        },
        fail: function (error) {
            var message = "عذرا هناك مشكله من فضلك اعد تحميل الصفحه";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'danger',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
        }
    });
});


/* ************************************************* Stuff *********************************************** */
//ٍStuff add
$("#addStuffForm").validate({
    rules: {
        name: {
            required: true,
            maxlength: 100,
            minlength: 10,
        },
        job: {
            maxlength: 100,
        },
        shift: "required",
        salary: "required",
        salary_get: "required",
        work_date: "required",
        phone: {
            required: true,
            number: true,
            maxlength: 11,
            minlength: 11,
        },
    },
    debug: true,
    submitHandler: function (form) {
        $(form).ajaxSubmit({
            success: function () {
                var message = "<br>تم اضافة الموظف  بنجاح    ";
                setTimeout(function () {
                    $.bootstrapGrowl(message, {
                        type: 'success',
                        align: 'right',
                        stackup_spacing: 30
                    });
                }, 1000);
            }
        });
        var formid = $("#addStuffForm");
        var FormV = formid.validate();
        FormV.resetForm();
    },
});

// Update of the Stuff
// ************ Update Form Of ٍ Stuff new 3/10/2018
$(".EditStuff").on('click', function () {
    let id = $(this).data('id');
    $.ajax({
        type: 'get',
        url: 'getUpdateStuff',
        data: {
            'id': id
        },
        success: function (data) {
            $(".id").val(data.stuff.id);
            $(".name").val(data.stuff.name);
            $(".phone").val(data.stuff.phone);
            $(".salary").val(data.stuff.salary);
            $(".salary_get").val(data.stuff.salary_get);
            $(".job").val(data.stuff.job);
            $(".shift").val(data.stuff.shift);
            $(".work_date").val(data.stuff.work_date);
            $(".types_ids").val(data.types_ids);
            $(".types_names").val(data.types_names);
        }
    });
});
// Send Updated Information to controller
$('.updateStuffForm').on('submit', function (e) {
    e.preventDefault();
    var id = $(".id").val();
    var name = $(".name").val();
    var phone = $(".phone").val();
    var salary = $(".salary").val();
    var salary_get = $(".salary_get").val();
    var job = $(".job").val();
    var shift = $(".shift").val();
    var work_date = $(".work_date").val();
    var types = $(".types_ids").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '/newUpdateStuff',
        data: {
            id: id,
            name: name,
            phone: phone,
            salary: salary,
            salary_get: salary_get,
            job: job,
            shift: shift,
            work_date: work_date,
            types: types,
        },
        async: true,
        //notification
        success: function (data) {
            var message = ' ' + data.name + "<br> تم تعديله بنجاح";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'success',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
            $('#CancelUpdateForm').click();
            $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
        }
    });
});

//Button delete One stuff in all Stuff table
$('.DeleteStuff').on('click', function (e) {
    e.preventDefault();
    let id = $(this).data('id');
    $('#deleteDetailModal #DeleteStuff_Id').val(id);
});
$('#deleteDetailModal .Delete_Stuff_confirmed').on('click', function (e) {
    e.preventDefault();
    let id = $('#deleteDetailModal #DeleteStuff_Id').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'DELETE',
        dataType: 'json',
        url: 'stuff/' + id,
        data: {
            'id': id,
        },
        async: true,
        success: function (data) {
            $('.Cancel_Delete_Form').click();
            var message = ' ' + data.name + ' ' + "<br> تم حذفه بنجاح";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'success',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
            $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
        },
        fail: function (error) {
            var message = "عذرا لم يتم حذفه";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'danger',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
        }
    });
});

/* Actions in Stuffs Details */
$('#changesalarygetto0stuff .make_all_salary_get_0_confirmed').on('click', function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: '/changesalarygetto0stuff',
        data: {
            'action': 0,
        },
        async: true,
        success: function (data) {
            $('.Cancel_Form').click();
            var message = "تم جعل كل المرتبات غير مدفوعه";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'success',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
            $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
        },
        fail: function (error) {
            var message = "عذرا هناك مشكله من فضلك اعد تحميل الصفحه";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'danger',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
        }
    });
});
$('#changesalarygetto1stuff .make_all_salary_get_1_confirmed').on('click', function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: '/changesalarygetto1stuff',
        data: {
            'action': 1,
        },
        success: function (data) {
            $('#changesalarygetto1stuff .Cancel_Form').click();
            var message = "تم جعل كل المرتبات مدفوعه";
            setTimeout(function (data) {
                $.bootstrapGrowl(message, {
                    type: 'success',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
            $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
        },
        fail: function (error) {
            var message = "عذرا هناك مشكله من فضلك اعد تحميل الصفحه";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'danger',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
        }
    });
});

/* ******************************************* Add The Admin 10/10  ************************************************************** */
$('.submit_admin').on('click', function (e) {
    e.preventDefault();
    var name = $('.Admin_name').val();
    var email = $('.Admin_email').val();
    var password = $('.Admin_password').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: 'admin',
        data: {'name': name, 'email': email, 'password': password},
        async: true,
        dataType: 'json',
        success: function (data) {
            var message = ' ' + data.name + "<br> تم اضافته بنجاح";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'success',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
            $("#addAdminForm")[0].reset();
            $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
        },
        error: function (data) {
            var errors = data.responseJSON;
            var message =' ' + JSON.stringify(errors.errors) + ' ';
            setTimeout(function () {
                $.bootstrapGrowl(message , {
                    type: 'danger',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 500);
        }

    });
});

//*********** Delete Incu Subject *******************
$(".DeleteAdmin").on('click', function () {
    let Admin_id = $(this).data('id');
    $('.DeleteAdminConfirmation #id_of_admin').val(Admin_id);
});
$('#DeleteAdminConfirmed').on('click', function (e) {
    e.preventDefault();
    let id = $('#id_of_admin').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'DELETE',
        dataType: 'json',
        url: 'admin/' + id,
        data: {'id': id},
        success: function (data) {
            var message = ' ' + data.name + "<br> تم مسح المسؤول بنجاح";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'success',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
            $('.ExitDeleteِAdminForm').click();
            $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
        },
        error: function (data) {
            var errors = data.responseJSON;
            var message =' ' + JSON.stringify(errors.errors) + ' ';
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'danger',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 500);
        }
    });
});

/* Edit Incu Subject */
$('.EditAdminButton').on('click', function () {
    let id = $(this).data('id');
    $.ajax({
        type: 'GET',
        url: 'admin/' + id + '/edit',
        data: {'id': id},
        success: function (data) {
            console.log(data);
            $('.EditAdminForm .admin_id').val(id);
            $('.EditAdminForm .admin_name').val(data.name);
            $('.EditAdminForm .admin_email').val(data.email);
        }
    });
});
$('.ButtonSubmitEditedAdmin').on('click', function (e) {
    e.preventDefault();
    let id = $('.EditAdminForm .admin_id').val();
    let name = $('.EditAdminForm .admin_name').val();
    let email = $('.EditAdminForm .admin_email').val();
    let password = $('.EditAdminForm .admin_password').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method: 'POST',
        url: '/UpdateAdmin',
        data: {
            'id': id,
            'name': name,
            'email': email,
            'password': password,
        },
        success: function (data) {
            $('.ExitIncuSubject').click();
            var message = ' ' + data.name + ' '+ "<br> تم تعديل المسؤول بنجاح لقبول اى تعديل قم باعادة تحميل الصفحة";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'success',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
            $('.ExitEditAdminForm').click();
            $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
        },
        error: function (data) {
            setTimeout(function () {
                $.bootstrapGrowl('المادة لا يمكن تعديلها من فضلك قم باعادة تحميل الصفحة !', {
                    type: 'danger',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 500);
        }
    });
});

/* **************************************** Student Of Center 12/10 ***************************** */
$('.submit_student').on('click', function (e) {
    e.preventDefault();
    var first_name = $("input[name=first_name]").val();
    var middle_name = $("input[name=middle_name]").val();
    var last_name = $("input[name=last_name]").val();
    // var dob = $("input[name=dob]").val();
    var phone = $("input[name=phone]").val();
    var address = $("input[name=address]").val();
    var payment = $("input[name=payment]").val();
    var stage_id = $("select[name=stage_id]").val();
    var sex = $("select[name=sex]").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: 'storeStudentCenter',
        data: {'first_name': first_name, 'middle_name': middle_name,'last_name': last_name, 'sex': sex, 'phone' :phone
        , 'payment': payment, 'address': address,'stage_id':stage_id},
        async: true,
        dataType: 'json',
        success: function (data) {
            var message = ' ' + data.name + "<br> تم اضافته بنجاح";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'success',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
            // $("#addAdminForm")[0].reset();
            // $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
        },
        error: function (data) {
            var errors = data.responseJSON;
            var message =' ' + JSON.stringify(errors.errors) + ' ';
            setTimeout(function () {
                $.bootstrapGrowl(message , {
                    type: 'danger',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 500);
        }

    });
});

//Update Student
$(".EditCenterStudent").on('click', function () {
    let id = $(this).data('id');
    $.ajax({
        type: 'get',
        url: 'getUpdateStudentCenter',
        data: {
            'id': id
        },
        success: function (data) {
            $("#S_id").val(data.Update_Student.id);
            $("#S_payment").val(data.Update_Payment.id);
            $("#S_first_name").val(data.Update_Student.first_name);
            $("#S_middle_name").val(data.Update_Student.middle_name);
            $("#S_last_name").val(data.Update_Student.last_name);
            $("#S_phone").val(data.Update_Student.phone);
            $("#S_address").val(data.Update_Student.address);
            $("#S_stage").val(data.Update_Student.stage_id);
            $("#S_sex").val(data.Update_Student.sex);
            $("#Update_Payment").val(data.Update_Payment.price);
            // $.each(data.Update_Classes,function(index,val){
            //     $('#Update_Classes').append($("<option></option>").attr("value",val.id).text(val.name));
            // });
        }

    });
});
$('.updateStudentForm').on('submit', function (e) {
    e.preventDefault();
    var id = $("#S_id").val();
    var payment_id = $("#S_payment").val();
    var first_name = $("#S_first_name").val();
    var middle_name = $("#S_middle_name").val();
    var last_name = $("#S_last_name").val();
    var address = $("#S_address").val();
    var sex = $("#S_sex").val();
    var phone = $("#S_phone").val();
    var payment = $("#Update_Payment").val();
    var stage_id = $("#S_stage").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '/newUpdateStudentCenter',
        data: {
            id: id,
            payment_id: payment_id,
            first_name: first_name,
            middle_name: middle_name,
            last_name: last_name,
            phone: phone,
            payment: payment,
            address: address,
            stage_id: stage_id,
            sex: sex,
        },
        async: true,
        //notification
        success: function (data) {
            var message = ' ' + data.first_name + ' ' + data.middle_name + ' ' + data.last_name + "<br> تم تعديله بنجاح";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'success',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
            $('#CancelUpdateForm').click();
            $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
        }
    });
});
// Actions on Incustudents
$('#changepaymentsgetto0centerstudent .make_allCenterstudent_payments_get_0_confirmed').on('click', function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: '/changepaymentsgetto0centerstudent',
        data: {
            'action': 0,
        },
        async: true,
        success: function (data) {
            $('.Cancel_Form').click();
            var message = "تم جعل كل المصروفات غير مدفوعه";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'success',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
            $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
        },
        fail: function (error) {
            var message = "عذرا هناك مشكله من فضلك اعد تحميل الصفحه";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'danger',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
        }
    });
});
$('#changepaymentsgetto1centerstudent .make_allCenterstudent_payments_get_1_confirmed').on('click', function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: '/changepaymentsgetto1centerstudent',
        data: {
            'action': 1,
        },
        success: function (data) {
            $('#changesalarygetto1stuff .Cancel_Form').click();
            var message = "تم جعل كل المصروفات مدفوعه";
            setTimeout(function (data) {
                $.bootstrapGrowl(message, {
                    type: 'success',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
            $('.Cancel_Form').click();
            $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
        },
        fail: function (error) {
            var message = "عذرا هناك مشكله من فضلك اعد تحميل الصفحه";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'danger',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
        }
    });
});


/* **************************************** Teacher Of Center 29/11 ***************************** */
/* ************************************************* Center  teacher  *********************************************** */
//Incu Teacher add
$("#addCenterTeacherForm").validate({
    rules: {
        name: {
            required: true,
            maxlength: 100,
            minlength: 10,
        },
        address: {
            maxlength: 100,
        },
        subject: {
            maxlength: 100,
        },
        sex: "required",
        salary: "required",
        salary_get: "required",
        work_date: "required",
        phone: {
            required: true,
            number: true,
            maxlength: 11,
            minlength: 11,
        },
    },
    debug: true,
    submitHandler: function (form) {
        $(form).ajaxSubmit({
            success: function () {
                var message = "<br>تم اضاة المدرس بنجاح    ";
                setTimeout(function () {
                    $.bootstrapGrowl(message, {
                        type: 'success',
                        align: 'right',
                        stackup_spacing: 30
                    });
                }, 1000);
            }
        });
        var formid = $("#addCenterTeacherForm");
        var FormV = formid.validate();
        FormV.resetForm();
    },
    success: function () {
    }
});

//Button delete Center  Single Teacher in all teachers table
$('.DeleteCenterTeacher').on('click', function (e) {
    e.preventDefault();
    let CenterTeacher_id = $(this).data('id');
    $('#deleteDetailModal #DeleteCenterTeacher_Id').val(CenterTeacher_id);
});

$('#deleteDetailModal .Delete_CenterTeacher_confirmed').on('click', function (e) {
    e.preventDefault();
    let id = $('#deleteDetailModal #DeleteCenterTeacher_Id').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'destroyCenterTeacher/',
        data: {
            'id': id,
        },
        async: true,
        success: function (data) {
            $('.Cancel_Delete_Form').click();
            var message = ' ' + data.name + ' ' + "<br> تم حذفه بنجاح";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'success',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
            $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
        },
        fail: function (error) {
            var message = "عذرا لم يتم حذفه";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'danger',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
        }
    });
});

// Update of the Teacher
// ************ Update Form Of Center Teacher new 29/11/2018
$(".EditTeacherUpdate").on('click', function () {
    let id = $(this).data('id');
    $.ajax({
        type: 'get',
        url: 'getUpdateCenterTeacher',
        data: {
            'id': id
        },
        success: function (data) {
            $(".T_id").val(data.Update_Teacher.id);
            $(".T_name").val(data.Update_Teacher.name);
            $(".T_phone").val(data.Update_Teacher.phone);
            $(".T_salary").val(data.Update_Teacher.salary);
            $(".T_salary_get").val(data.Update_Teacher.salary_get);
            $(".T_address").val(data.Update_Teacher.address);
            $(".T_sex").val(data.Update_Teacher.sex);
            $(".T_work_date").val(data.Update_Teacher.work_date);
            $(".T_subject").val(data.Update_Teacher.subject);
        }
    });
});
// Send Updated Information to controller
$('.updateCenterTeacherForm').on('submit', function (e) {
    e.preventDefault();
    var id = $(".T_id").val();
    var name = $(".T_name").val();
    var phone = $(".T_phone").val();
    var salary = $(".T_salary").val();
    var salary_get = $(".T_salary_get").val();
    var address = $(".T_address").val();
    var sex = $(".T_sex").val();
    var work_date = $(".T_work_date").val();
    var subject = $(".T_subject").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '/newUpdateCenterTeacher',
        data: {
            id: id,
            name: name,
            phone: phone,
            salary: salary,
            salary_get: salary_get,
            address: address,
            sex: sex,
            work_date: work_date,
            subject: subject,
        },
        async: true,
        //notification
        success: function (data) {
            var message = ' ' + data.name + "<br> تم تعديله بنجاح";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'success',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
            $('#CancelUpdateForm').click();
            $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
        }
    });
});

/* Actions in Incu Teachers Details */
$('#make_all_salary_get_0 .make_all_centerTeacher_salary_get_0_confirmed').on('click', function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: '/changecentersalarygetto0',
        data: {
            'action': 0,
        },
        async: true,
        success: function (data) {
            $('.Cancel_Form').click();
            var message = "تم جعل كل المرتبات غير مدفوعه";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'success',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
            $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
        },
        fail: function (error) {
            var message = "عذرا هناك مشكله من فضلك اعد تحميل الصفحه";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'danger',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
        }
    });
});
$('#make_all_salary_get_1 .make_all_centerTeacher_salary_get_1_confirmed').on('click', function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: '/changecentersalarygetto1',
        data: {
            'action': 1,
        },
        success: function (data) {
            $('#make_all_salary_get_1 .Cancel_Form').click();
            var message = "تم جعل كل المرتبات مدفوعه";
            setTimeout(function (data) {
                $.bootstrapGrowl(message, {
                    type: 'success',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
            $('#attendenceDetailedTable').load(document.URL + ' #attendenceDetailedTable');
        },
        fail: function (error) {
            var message = "عذرا هناك مشكله من فضلك اعد تحميل الصفحه";
            setTimeout(function () {
                $.bootstrapGrowl(message, {
                    type: 'danger',
                    align: 'right',
                    stackup_spacing: 30
                });
            }, 1000);
        }
    });
});




/*
Comment Update Form Of Incustudent
var Incustudentid ;
$('.updateIncustudent').click(function () {
    Incustudentid = this.id;
    var submitButtonUpdate = ".updateIncustudentForm"+Incustudentid;
    $("'"+submitButtonUpdate+"'").submit(function (e) {
        e.preventDefault();
    });
    var id = Incustudentid;
    var first_name = $("input[name=first_name]").val();
    var middle_name = $("input[name=middle_name]").val();
    var last_name = $("input[name=last_name]").val();
    var status = $("select[name=status]").val();
    var phone = $("input[name=phone]").val();
    var payment = $("input[name=payment]").val();
    var class_id = $("select[name=class_id]").val();
    var shift_id = $("select[name=shift_id]").val();
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
// function abortAjax(xhr) {
//     if(xhr && xhr.readyState !== 4){
//         xhr.abort();
//     }
// }
$.ajax({
    type:"PUT",
    data: {
        id:id,
        first_name: first_name,
        middle_name: middle_name,
        last_name: last_name,
        phone: phone,
        payment: payment,
        class_id: class_id,
        shift_id: shift_id,
        status: status,
    },
    url:"/incustudent/"+id,
    success:function (data) {
        console.log(data)
    }
    });
});
}
$("#addIncustudent").click(function () {
    validator();
    $("#addIncustudentForm").submit(function(e){
        e.preventDefault();
    });

});
});
*/
