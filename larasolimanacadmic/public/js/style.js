$(document).ready(function () {
    "use strict";
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


    // ************** Delete Form of Incustudent 24/9 **************************
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
    $('.EditIncuSubjectButton').on('click',function () {
        let id = $(this).data('id');
        $.ajax({
            type:'GET',
            url:'incusubject/'+id+'/edit',
            data:{'id':id},
            success:function (data) {
                $('.EditIncuSubjectForm .IncuSubject_id').val(id);
                $('.EditIncuSubjectForm .IncuSubject_code').val(data.code);
                $('.EditIncuSubjectForm .IncuSubject_name').val(data.name);
            }
        });
    });
    $('.ButtonSubmitEditedIncuSubject').on('click',function (e) {
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
            method:'POST',
            url:'/newUpdateSubject',
            data:{
                'id':id,
                'name':name,
                'code':code,
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
            data: {'salary': salary, 'type_id': type_id, 'day': day,'description':description},
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
    $('.EditBudgetButton').on('click',function () {
        let id = $(this).data('id');
        $.ajax({
            type:'GET',
            url:'budget/'+id+'/edit',
            data:{'id':id},
            success:function (data) {
                $('.EditBudgetForm .Budget_Id').val(id);
                $('.EditBudgetForm .Budget_Type').val(data.type_id);
                $('.EditBudgetForm .Budget_Salary').val(data.salary);
                $('.EditBudgetForm .Budget_Description').val(data.description);
                $('.EditBudgetForm .Budget_Day').val(data.day);
                console.log(data);
            }
        });
    });
    $('.ButtonSubmitEditedBudget').on('click',function (e) {
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
            method:'POST',
            url:'/updatebudget',
            data:{
                'id':id,
                'type_id':type_id,
                'salary':salary,
                'description':description,
                'day':day,
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
