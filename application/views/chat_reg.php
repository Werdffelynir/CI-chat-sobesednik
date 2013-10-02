<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="<?=base_url()?>css/lite.css" type="text/css" />
    <link rel="stylesheet" href="<?=base_url()?>css/elements.css" type="text/css" />
    <link rel="stylesheet" href="<?=base_url()?>css/style.css" type="text/css" />
    <script type="text/javascript" src="<?=base_url()?>js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/jquery.form.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/jquery.timer.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/script.js"></script>

    <title>Title</title>

<style type="text/css" rel="stylesheet" >

</style>
</head>
<body>

<div class="header_pod_box grad_01"></div>

<header class="lite clear">

    <div class="header_box grad_01">
        <div class="header_title first lite_9"><h1>Собеседник</h1></div>
        <div class="lite_3">
            <div class="header_menu">
                <span class="top_menu_1 first lite_6"> </span>
                <span class="top_menu_2 lite_6"> <a href="<?=base_url()?>">Отмена</a> </span>
            </div>
        </div>
    </div>
</header>

<div class="wrraper lite clear">

    <section class="first lite_9">

        <form id="new_user_form" name="" action="<?=base_url()?>chat/reg_validation" method="post">
            <div class="monitor_reg">

                <h3>Регистрация нового собеседника.</h3>
                <p>После регистрации вам будет создан персонльный профиль, к которому будите иметь доступ
                    только вы. Приемущества зарегистрированого пользователя позволят вам войти в карту
                    видимости сети, дадут возможность обмениваться сообщениями, просматривать профели
                    других пользователей, также делится и скачивать файлы.</p>

                <div class="first lite clear">

                    <div class="first lite_4">&nbsp;&nbsp;</div>

                    <div class="lite_3">

                        <div class="reg_pole">
                            <p><label>Ваше Имя <span class="form_star err_name"> * </span> :</label></p>
                            <p><input name="reg_name" type="text" value="" /></p>
                        </div>

                        <div class="reg_pole">
                            <p><label>Логин (для входа) <span class="form_star err_login"> * </span> :</label></p>
                            <p><input name="reg_login" type="text" value="" /></p>
                        </div>

                        <div class="reg_pole">
                            <p><label>Пароль (для входа) <span class="form_star err_pass"> * </span> :</label></p>
                            <p><input name="reg_pass_one" type="text" value="" /></p>
                        </div>

                        <div class="reg_pole">
                            <p><label>Подтвердить пароль <span class="form_star err_pass"> * </span> :</label></p>
                            <p><input name="reg_pass_two" type="text" value="" /></p>
                        </div>

                        <div class="reg_pole">
                            <p><label>Где вы живете:</label></p>
                            <p><input name="reg_territory" type="text" value="" /></p>
                        </div>

                        <div class="reg_pole">
                            <p><label>Ваш телефон:</label></p>
                            <p><input name="reg_phone" type="text" value="" /></p>
                        </div>

                        <div class="reg_pole">
                            <p><label>Ваш Email <span class="form_star err_email"> * </span> :</label></p>
                            <p><input name="reg_email" type="text" value="" /></p>
                        </div>

                        <div class="reg_pole lite">

                            <p><label>Код подтверждения <span class="form_star err_code"> * </span> :</label></p>
                            <p>
                                <div class=" ">
                                <?=$c_image;?>
                                </div>
                                <div class="">
                                    <input class="capcha_code" name="reg_code" type="text" value="" />
                                </div>
                            </p>
                        </div>


                    </div>

                    <div class="lite_2">&nbsp;&nbsp;</div>
                </div>

            </div>

            <div class="form_btn">
                <span  class="cancel_btn"><a href="<?=base_url()?>">Отмена</a></span>
                <input class="reg_btn " type="submit" value="Регистрация" />
            </div>

        </form>


    </section>

    <aside class="lite_3"> </aside>

</div>

<footer></footer>

</body>
</html>