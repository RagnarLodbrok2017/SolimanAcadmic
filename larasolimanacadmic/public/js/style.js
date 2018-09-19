$(document).ready(function($){
    "use strict";

    $("#addIncustudent").click(function () {
        $("#addIncustudentForm").submit(function(e){
            e.preventDefault();
        });
        var first_name = $("input[name=first_name]").val();
        var middle_name = $("input[name=middle_name]").val();
        var last_name = $("input[name=last_name]").val();
        var sex = $("input[name=sex]").val();
        var dob = $("input[name=dob]").val();
        var phone = $("input[name=phone]").val();
        var address = $("input[name=address]").val();
        var payment = $("input[name=payment]").val();
        var class_id = $("select[name=class_id]").val();
        var level_id = $("select[name=level_id]").val();
        var shift_id = $("select[name=shift_id]").val();
        var status = $("select[name=status]").val();
        var token = $("#token").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:"POST",
            data:{
                first_name:first_name,
                middle_name:middle_name,
                last_name:last_name,
                sex:sex,
                dob:dob,
                phone:phone,
                address:address,
                payment:payment,
                class_id:class_id,
                level_id:level_id,
                shift_id:shift_id,
                status:status,
                token:token
            },
            // data: "first_name" + first_name + "&middle_name" +middle_name+ "&last_name" +last_name+ "&sex" +sex+ "&dob" +dob+
            //     "&phone" +phone+ "&address" +address+  "&payment" +payment+ "&token" +token+ "&class_id" +class_id+
            //     "&level_id" +level_id+ "&shift_id" +shift_id+ "&status" +status,
            // url:"<?php echo route('incustudent.store')?>",
            // url:"<?php echo url('/incustudent')?>",
            url:'/incustudent',
            success:function (data) {
        }
    });

    });
});
