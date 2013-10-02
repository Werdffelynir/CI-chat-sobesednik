<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="<?=base_url()?>css/lite.css" type="text/css" />
    <link rel="stylesheet" href="<?=base_url()?>css/elements.css" type="text/css" />
    <link rel="stylesheet" href="<?=base_url()?>css/style.css" type="text/css" />
    <script type="text/javascript" src="<?=base_url()?>js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/jquery.form.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/script.js"></script>
    <title>Title</title>

<style type="text/css" rel="stylesheet" >

</style>


</head>
<body>

<div class="header_pod_box grad_01"></div>

<header class="lite clear">

    <div class="header_box grad_01">
        <div class="header_title first lite_8"><h1>Собеседник</h1></div>
        <div class="lite_4">
            <div class="header_menu">
                <span class="top_menu_1 first lite_6"><?php echo $top_menu_1; ?></span>
                <span class="top_menu_2 lite_6"><?php echo $top_menu_2; ?></span>
            </div>
        </div>
    </div>
</header>

<div class="wrraper lite clear">
    <section class="first lite_9">
        <div class="monitor">

            <form id="settings_user_form" name="" action="<?=base_url()?>chat/user_update_data" method="post" enctype="multipart/form-data" >

                <div class="lite clear">

                    <div class="first lite_4">
                        <div class="sett_pole">
                            <p><label>Изменить Имя <span class="form_star err_name">  </span> :</label></p>
                            <p><input name="sett_name" type="text" value="<?php echo $user_name; ?>" /></p>
                        </div>

                        <div class="sett_pole">
                            <p><label>Изменить Email <span class="form_star err_email">  </span> :</label></p>
                            <p><input name="sett_email" type="text" value="<?php echo $user_email; ?>" /></p>
                        </div>

                        <div class="sett_pole">
                            <p><label>Где вы живете:</label></p>
                            <p><input name="sett_territory" type="text" value="<?php echo $user_territory; ?>" /></p>
                        </div>

                        <div class="sett_pole">
                            <p><label>Изменить телефон:</label></p>
                            <p><input name="sett_phone" type="text" value="<?php echo $user_telephone; ?>" /></p>
                        </div>

                        <div class="sett_pole">
                            <p><label>Изменить Логин <span class="form_star err_login">  </span> :</label></p>
                            <p><input name="sett_login" type="text" value="<?php echo $user_login; ?>" /></p>
                        </div>

                        <div class="sett_pole">
                            <p><label>Пароль <span class="form_star err_pass">  </span> :</label></p>
                            <p><input name="sett_pass_one" type="text" value="" /></p>
                        </div>

                        <div class="sett_pole">
                            <p><label>Новый Пароль <span class="form_star err_pass">  </span> :</label></p>
                            <p><input name="sett_pass_one" type="text" value="" /></p>
                        </div>

                        <div class="sett_pole">
                            <p><label>Подтвердить пароль <span class="form_star err_pass">  </span> :</label></p>
                            <p><input name="sett_pass_two" type="text" value="" /></p>
                        </div>
                    </div>

                    <div class="lite_8 sett_right">
                        <div class="sett_pole">
                            <p><label>Изменить аватар <span class="form_star "> </span> :</label></p>
                            <!--<p><input name="userfile" type="file" /></p>-->
                            <p><input type="file" name="sett_ava" /></p>

                        </div>
                        <div class="sett_pole">
                            sett_ava Приемущества зарегистрированого пользователя позволят вам войти в карту видимости сети, дадут возможность обмениваться сориемущества зарегистрированоьзователя позвойти в карту видимости сетадут возможность обмениваться сообаного пользователя позволят вам войти в карту видимости сети, дадут возможность обмениваться сообщениями
                        </div>
                        <div class="sett_pole">
                            <p><label>О себе :</label></p>
                            <p><textarea name="sett_info"><?php echo $user_info; ?></textarea></p>
                        </div>

                    </div>

                </div>


            <div class="form_btn_settings">
                <input class="settings_btn" name="setting_update"  type="submit" value="Сохранить настройки" />
            </div>

            </form>

        </div>
    </section>

    <aside class="lite_3">

<!-- Вывод зарегистрированого пользователя -->

            <div class="right_id">
                <div class="user_name"><label>Вы:</label> <?php echo $user_name; ?> </div>
                <div class="user_ava"><?php echo $user_avatar; ?> </div>
            </div>
            <nav>
                <ul><label>Откуда Вы:</label>
                    <li><!--<a href=""></a> --><?php echo $user_territory; ?></li>
                    <label>Email:</label>
                    <li><!--<a href=""></a> --><?php echo $user_email; ?></li>
                    <label>Тел:</label>
                    <li><!--<a href=""></a> --><?php echo $user_telephone; ?></li>
                </ul>
            </nav>

    </aside>
</div>

<footer></footer>

</body>
</html>