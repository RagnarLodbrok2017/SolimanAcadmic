$(document).ready(function(){
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
                    minlength:11,
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
                    number:true,
                    maxlength: 11,
                    minlength:11,
                },
                LPhone: {
                    number:true,
                    maxlength: 11,
                    minlength:11,
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
            submitHandler: function(form) {
                $(form).ajaxSubmit({
                    success:function () {
                        $('#message_lara').css('display','block');
                        setTimeout(function() {
                            $('#message_lara').css('display','none');
                        },2000);
                    }
                });
                var formid = $("#addIncustudentForm");
                var FormV = formid.validate();
                FormV.resetForm();
            },
            success:function () {
            }
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
