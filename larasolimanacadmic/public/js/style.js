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


    // Update Form Of Incustudent
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
    // }
    // $("#addIncustudent").click(function () {
    //     validator();
    //     $("#addIncustudentForm").submit(function(e){
    //         e.preventDefault();
    //     });
    //
    // });
});
