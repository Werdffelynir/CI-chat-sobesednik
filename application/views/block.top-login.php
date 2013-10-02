<?php if(isset($top_login)): ?>
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
                <p><input class="en_password" type="password" value="" /></p>
                <p><input class="en_url" type="text" hidden="hidden" value="<?php echo base_url();?>" /></p>
            </div>

            <div class="user_login_btn_control">
                <span  class="cancel_btn user_login_cancel"><a href="#close">Отмена</a></span>
                <input class="reg_btn " type="submit" value="Войти" />
            </div>

        </form>
    </div>
<!--
    <div class="user_personal_box">
        <div class="lite clear">
            <div class="first lite_11"><h3 class="pors_name">Вася Пупкин</h3></div>
            <div class="lite_1"><span class="user_personal_cancel"></span></div>
        </div>

        <span class="login_val"></span>

        <div class="lite clear">
            <div class="first lite_3">
                <span class="pors_avatar">
                    <img src="http://dev.loc/sobesednik/images/avatars/avatar_guest.png" height="128" width="128">
                </span>
            </div>
            <div class="lite_9 contact_info">

                <p class="lable">От куда:</p>
                <p class="pors_territory">Киев</p>

                <p class="lable">Email: </p>
                <p class="pors_email">admin@admin.com</p>

                <p class="lable">Телефон:</p>
                <p class="pors_phone">087 984 894 894</p>

            </div>
        </div>

        <span class="login_val"></span>

        <div class="lite clear">
            <p class="lable">О себе:</p>
            <span class="pors_info">
                <p>jQuery плагин прокрутки поможет сделать сайт более привлекательным, а также улучшит отображение содержания. Это дает пользователям свободу представить содержание самым надлежащим способом.</p>
                <p>Некоторые плагины могут помочь дизайнерам в формировании содержания и общего вида веб-сайта. Они обеспечивают рамки вертикальной и горизонтальной  полосы прокрутки, а иногда и их комбинации.</p>
            </span>
        </div>

    </div>
-->

<?php endif; ?>