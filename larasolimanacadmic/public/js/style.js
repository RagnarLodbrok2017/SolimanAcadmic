$(document).ready(function($){
    "use strict";
    function validator() {
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
                class_id: "required",
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
                $(form).ajaxSubmit();
                var formid = $("#addIncustudentForm");
                var FormV = formid.validate();
                FormV.resetForm();
            },
        });
    }
    $("#addIncustudent").click(function () {
        validator();
        $("#addIncustudentForm").submit(function(e){
            e.preventDefault();
        });

    });
});
