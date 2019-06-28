$(function () {
    $.extend($.validator.messages, {
        required: "必須項目です"
    });

    $.validator.addMethod("valueNotEquals", function(value, element, arg){
        return arg != value;
    }, "選択してください");

    $.validator.addMethod("viewcnt", function(value, element){
        return this.optional(element) || /^[\d]+$/.test(value);
    }, "数字のみ入力してください");

    $("#nameForm").validate({
        rules: {
            todohuken: {
                valueNotEquals: "msg"
            },
            fname: {
                required: true,
                maxlength: 50
            },
            lname: {
                required: true,
                maxlength: 50
            },
            viewcnt: {
                required: true,
                number: true
            },

        },
        messages: {
            todohuken: {
                equalTo: "選択してください"
            },
            fname: {
                required: "必須項目です",
                maxlength: "50文字以内で入力してください"
            },
            lname: {
                required: "必須項目です",
                maxlength: "50文字以内で入力してください"
            },
            viewcnt: {
                required: "必須項目です",
                number: "数字のみ入力してください"
            },

        },
        errorClass: "error_msg",
        wrapper: "li"
    });
});
