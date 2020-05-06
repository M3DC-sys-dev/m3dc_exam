$(function () {

    $.validator.addMethod("valueNotEquals", function(value, element, arg){
        return arg != value;
    }, "選択してください");


    $("#nameForm").validate({
        rules: {
            todohuken: {
                valueNotEquals: "msg"
            },
            lname: {
                required: true,
                maxlength: 50
            },
            fname: {
                required: true,
                maxlength: 50
            },
            part_num: {
                required: true,
                digits: true,
                number: true
            },

        },
        messages: {
            todohuken: {
                equalTo: "選択してください"
            },
            lname: {
                required: "必須項目です",
                maxlength: "50文字以内で入力してください"
            },
            fname: {
                required: "必須項目です",
                maxlength: "50文字以内で入力してください"
            },
            part_num: {
                required: "必須項目です",
                digits: "数字のみ入力してください",
                number: "数字のみ入力してください"
            },

        },
        errorClass: "error_msg",
        wrapper: "li"
    });
});
