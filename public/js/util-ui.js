$(function () {

    $.validator.addMethod("valueNotEquals", function(value, element, arg){
        return arg != value;
    }, "選択してください");

    $("#nameForm").validate({
        rules: {
            todohuken: {
                valueNotEquals: "msg"
            },
            sei: {
                required: true,
                maxlength: 50
            },
            mei: {
                required: true,
                maxlength: 50
            },
            ninzu: {
                required: true,
                number: true
            }
        },
        messages: {
            todohuken: {
                equalTo: "選択してください"
            },
            sei: {
                required: "必須項目です",
                maxlength: "50文字以下で入力してください"
            },
            mei: {
                required: "必須項目です",
                maxlength: "50文字以下で入力してください"
            },
            ninzu: {
                required: "必須項目です",
                number: "数字のみ入力してください"
            }
        },
        errorClass: "error_msg",
        wrapper: "li"
    });
});
