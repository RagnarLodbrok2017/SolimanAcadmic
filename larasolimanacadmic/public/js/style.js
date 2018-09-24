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


    // ************** Delete Form of Incustudent 24/9
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
            url:'incustudent/'+id,
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
            fail:function (error) {
                console.log(error);
            }
        });
    });


    // Update Form Of Incustudent
    // var Incustudentid ;
    // $('.updateIncustudent').click(function () {
    //     Incustudentid = this.id;
    //     var submitButtonUpdate = ".updateIncustudentForm"+Incustudentid;
    //     $("'"+submitButtonUpdate+"'").submit(function (e) {
    //         e.preventDefault();
    //     });
    //     var id = Incustudentid;
    //     var first_name = $("input[name=first_name]").val();
    //     var middle_name = $("input[name=middle_name]").val();
    //     var last_name = $("input[name=last_name]").val();
    //     var status = $("select[name=status]").val();
    //     var phone = $("input[name=phone]").val();
    //     var payment = $("input[name=payment]").val();
    //     var class_id = $("select[name=class_id]").val();
    //     var shift_id = $("select[name=shift_id]").val();
    //     $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    // // function abortAjax(xhr) {
    // //     if(xhr && xhr.readyState !== 4){
    // //         xhr.abort();
    // //     }
    // // }
    // $.ajax({
    //     type:"PUT",
    //     data: {
    //         id:id,
    //         first_name: first_name,
    //         middle_name: middle_name,
    //         last_name: last_name,
    //         phone: phone,
    //         payment: payment,
    //         class_id: class_id,
    //         shift_id: shift_id,
    //         status: status,
    //     },
    //     url:"/incustudent/"+id,
    //     success:function (data) {
    //         console.log(data)
    //     }
    //     });
    // });
    // }
    // $("#addIncustudent").click(function () {
    //     validator();
    //     $("#addIncustudentForm").submit(function(e){
    //         e.preventDefault();
    //     });
    //
    // });
});
