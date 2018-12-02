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
            viewcnt: {
                required: true,
                number: true
            },

        },
        messages: {
            todohuken: {
                equalTo: "選択してください"
            },
            lname: {
                required: "必須項目です",
                maxlength: "50文字以下で入力してください"
            },
            fname: {
                required: "必須項目です",
                maxlength: "50文字以下で入力してください"
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

(function(window, $){
    $(window).load(function(){
      var $frame = $('.frame');
      var innerHeight = $frame.get(0).contentWindow.document.body.scrollHeight + 12;
      var innerWidth = $frame.get(0).contentWindow.document.body.scrollWidth + 8;
      $frame.attr('height', innerHeight + 'px');
      $frame.attr('width', innerWidth + 'px');
    })
  })(window, jQuery)