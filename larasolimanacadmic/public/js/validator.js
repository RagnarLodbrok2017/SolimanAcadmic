// $(document).ready(function($) {
//     "use strict";
//     $("#addIncustudentForm").validate({
//         rules: {
//             first_name: {
//                 required: true,
//                 maxlength: 15,
//                 messages: {
//                     required: "it's required Field",
//                     maxlength: jQuery.validator.format("the length must be < 15")
//                 }
//             }
//         }
//     });
//
// });
//
// success:function () {
//     var first_name = $("input[name=first_name]").val();
//     var middle_name = $("input[name=middle_name]").val();
//     var last_name = $("input[name=last_name]").val();
//     var sex = $("select[name=sex]").val();
//     var dob = $("input[name=dob]").val();
//     var status = $("select[name=status]").val();
//     var phone = $("input[name=phone]").val();
//     var address = $("input[name=address]").val();
//     var payment = $("input[name=payment]").val();
//     var class_id = $("select[name=class_id]").val();
//     var level_id = $("select[name=level_id]").val();
//     var shift_id = $("select[name=shift_id]").val();
//     var father_name = $("input[name=father_name]").val();
//     var mother_name = $("input[name=mother_name]").val();
//     var FPhone = $("input[name=FPhone]").val();
//     var LPhone = $("input[name=LPhone]").val();
//     var job = $("input[name=job]").val();
//     var email = $("input[name=email]").val();
//     var nationality = $("select[name=nationality]").val();
//     var region = $("select[name=region]").val();
//     var token = $("#token").val();
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     function abortAjax(xhr) {
//         if(xhr && xhr.readyState !== 4){
//             xhr.abort();
//         }
//     }
//     $.ajax({
//         type:"POST",
//         data:{
//             first_name:first_name,
//             middle_name:middle_name,
//             last_name:last_name,
//             sex:sex,
//             dob:dob,
//             phone:phone,
//             address:address,
//             payment:payment,
//             class_id:class_id,
//             level_id:level_id,
//             shift_id:shift_id,
//             status:status,
//             //Parents Data
//             father_name:father_name,
//             mother_name:mother_name,
//             FPhone:FPhone,
//             LPhone:LPhone,
//             job:job,
//             email:email,
//             nationality:nationality,
//             region:region,
//             token:token
//         },
//         // data: "first_name" + first_name + "&middle_name" +middle_name+ "&last_name" +last_name+ "&sex" +sex+ "&dob" +dob+
//         //     "&phone" +phone+ "&address" +address+  "&payment" +payment+ "&token" +token+ "&class_id" +class_id+
//         //     "&level_id" +level_id+ "&shift_id" +shift_id+ "&status" +status,
//         // url:"<?php echo route('incustudent.store')?>",
//         // url:"<?php echo url('/incustudent')?>",
//         url:'/incustudent',
//         success:function (data) {
//             var Form = $("#addIncustudentForm");
//             var validator = Form.validate();
//             Form[0].reset();
//             validator.resetForm();
//         }
//     });
//     abortAjax(xhr);
// }
