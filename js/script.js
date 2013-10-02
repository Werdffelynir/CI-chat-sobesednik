$(document).ready(function(){


    $('a#fboximg').fancybox({
        padding: 0,
        openEffect : 'elastic',
        openSpeed  : 150,
        closeEffect : 'elastic',
        closeSpeed  : 150,
        closeClick : true,
        helpers : {
            overlay : null
        }
    });


    function scrollBotom(){

        var topScroll = $(".mess_box_all_message").height();
        $("#scrollDivM").scrollTop(topScroll);

        scrollDiv();
    }
    scrollBotom();


    function scrollDiv(){
        $("body, .monitor_history, /*#scrollDivM,*/ .areaScroll").niceScroll({
            boxzoom:true,
            cursorcolor:"#370037",
            nativeparentscrolling: false,
            cursorwidth: "10px",
            cursorborder: "1px solid #CE72CE",
            cursorborderradius: "10px"
        });
    }


    // Обработка главного окна чата
    function message_ajax(){

        var m_url = $("input.this_url").val();

        $.ajax({
            type: "GET",
            url: m_url+"chat/monitor_message",
            success: function(msg){

                if(msg != 'old_db'){
                    $(".monitor").html(msg);
                    var audio = $("#bells")[0];
                    audio.play();
                    scrollBotom();
                }
            }
        });

    }



    // Таймеры для обновления сообщений
    var timer = $.timer(function() {

        //get_record_id();
        message_ajax();

    });

    timer.set({ time : 5000, autostart : true });


    // Блок загрузки файлов
    $(".type_upload_file_btn").click(function(){
        $(".type_upload_file_box").slideToggle();
    });


    // Блок Входа
    $(".user_login_btn").click(function(){
        $(".user_login_box_bg").fadeToggle(300);
        $(".user_login_box").fadeToggle(400);
    });
    $(".user_login_cancel").click(function(){
        $(".user_login_box_bg").fadeToggle(500);
        $(".user_login_box").fadeToggle(300);
    });


    // Авторизация
    $("#login").submit(function() {

        var url = $("input.en_url").val();
        var login = $("input.en_login").val();
        var password = $("input.en_password").val();

        $.ajax({
            type: "POST",
            url: url+"chat/login",
            data: { en_login: login, en_password: password },
            success: function(msg){
                if(msg == 'log_error'){
                    $(".login_val").html("Не верен Логин или Пароль!");
                }else{
                    document.location.href = msg;
                }
            }
        });
        return false;
    });



    $(".user_personal_info", this).click(function() {

        var user_data_id = $(this).attr("user-data");
        $(".user_personal_box").css("display", "block");

        //alert(user_data_id);
        $.ajax({
            type: "GET",
            dataType:  'json',
            url: "chat/user_info/"+user_data_id,

            data: { user_id: user_data_id },

            success: function(data){
                //alert(data);
                $(".pors_name").html(data.name);
                $(".pors_avatar").html(data.avatar);
                $(".pors_territory").html(data.territory);
                $(".pors_email").html(data.email);
                $(".pors_phone").html(data.telephone);
                $(".pors_info").html(data.info);

            }
        });
    });

    $(".user_personal_cancel").click(function() {
        $(".user_personal_box").css("display", "none");
    });


    // Отправка сообщений пользователем AJAX
    var options_form_message = {

        clearForm: true,

        success:   function() {
            $.ajax({
                type: "POST",
                url: "chat/monitor_message/re",
                success: function(msg){

                    $(".monitor").html(msg);

                    scrollBotom();
                }
            });

        }
    };
    $('#form_message').ajaxForm(options_form_message);



    // регистрация AJAX
    var new_user_form = {
        //clearForm: true,

        dataType:  'json',

        success:   function(data) {

            if(data.name == undefined) $(".err_name").html(" ok");
            else $(".err_name").html(data.name);

            if(data.login == undefined)  $(".err_login").html(" ok");
            else $(".err_login").html(data.login);

            if(data.password == undefined) $(".err_pass").html(" ok");
            else $(".err_pass").html(data.password);

            if(data.email == undefined) $(".err_email").html(" ok");
            else $(".err_email").html(data.email);

            if(data.code == undefined) $(".err_code").html(" ok");
            else $(".err_code").html(data.code);

            if(data.redirect !== undefined){
                document.location.href = data.redirect;
            }

        }
    };

    $('#new_user_form').ajaxForm(new_user_form);


/*
    // регистрация AJAX
    var settings_user_form = {
        //clearForm: true,

        dataType:  'json',

        success:   function(data) {

            if(data.name == undefined) $(".err_name").html(" ok");
            else $(".err_name").html(data.name);

            if(data.login == undefined)  $(".err_login").html(" ok");
            else $(".err_login").html(data.login);

            if(data.password == undefined) $(".err_pass").html(" ok");
            else $(".err_pass").html(data.password);

            if(data.email == undefined) $(".err_email").html(" ok");
            else $(".err_email").html(data.email);

            if(data.code == undefined) $(".err_code").html(" ok");
            else $(".err_code").html(data.code);

            if(data.redirect !== undefined){
                document.location.href = data.redirect;
            }

        }
    };

    $('#ZZsettings_user_form').ajaxForm(settings_user_form);*/


}); // END document ready