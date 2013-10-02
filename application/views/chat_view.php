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
<!--  -->
<?php if($top_login): ?>
    <div class="user_login_box_bg"></div>
    <div class="user_login_box">
        <h4>Войдите в систему</h4>
        <form id="login" name="" action="" method="post">

            <span class="login_val"></span>

            <div class="reg_pole user_login_pole">
                <p><label>Логин:</label></p>
                <p><input class="en_login" type="text" value="" /></p>
            </div>

            <div class="reg_pole user_login_pole">
                <p><label>Пароль:</label></p>
                <p><input class="en_password" type="text" value="" /></p>
            </div>

            <div class="user_login_btn_control">
                <span  class="cancel_btn user_login_cancel"><a href="#close">Отмена</a></span>
                <input class="reg_btn " type="submit" value="Войти" />
            </div>

        </form>
    </div>
<?php endif; ?>

<!--  -->
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
<!--  -->
<div class="wrraper lite clear">
    <section class="first lite_9">
        <div class="monitor">







        </div>
        <div class="chatform">
            <?php if(isset($user_name)): ?>
                <form id="form_message" name="" action="<?=base_url()?>chat/setMessage" method="post" enctype="multipart/form-data">

                    <textarea name="send_message"></textarea>

                    <div class="type_upload_file_box">
                        <input name="send_file" type="file" value="Загрузить" />
                    </div>

                    <span class="type_upload_file_btn ">Файл / Фото</span>
                    <input class="type_submit_message " type="submit" value="Отправить" />
                </form>
            <?php else: ?>
                <div class="no_form">Для возможности отправления сообщений и просмотра фалов, Вам необходимо <a class="user_login_btn" href="#login\" >Войти</a> или <a href="<?php echo base_url(); ?>chat/registration">Зарегистироваться</a>.</div>
            <?php endif; ?>
        </div>
    </section>

    <aside class="lite_3">
<!-- Вывод зарегистрированого пользователя -->
        <?php if(isset($user_name)): ?>
            <?php //echo __item__ ; ?>

            <div class="right_id">
                <div class="user_name"><label>Вы:</label> <?php echo $user_name; ?> </div>
                <div class="user_ava"><?php echo $user_ava; ?> </div>
            </div>
            <nav>
                <ul><label>Откуда Вы:</label>
                    <li><?php echo $user_territory; ?></li>
                    <label>Email:</label>
                    <li><?php echo $user_email; ?></li>
                    <label>Тел:</label>
                    <li><?php echo $user_telephone; ?></li>
                </ul>
            </nav>

<!-- Вывод НЕ зарегистрированого пользователя -->
        <?php else: ?>

            <div class="right_id">
                <div class="user_name"><label>Здравствуй </label> гость</div>
                <div class="user_ava"><img src="<?=base_url()?>images/avatars/avatar.png" width="128" height="128"></div>
            </div>
            <nav>
                <ul><label>Для доступа необходимо:</label>
                    <li><a href="/private_messager/chat/registration">Зарегистрироваться</a></li>
                </ul>
            </nav>

        <?php endif; ?>





    </aside>
</div> <!--wrraper-->

<footer></footer>

</body>
</html>