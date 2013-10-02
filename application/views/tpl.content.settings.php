
    <section class="first lite_9">
        <div class="monitor_box">

            <form id="settings_user_form" name="" action="<?=base_url()?>settings" method="post" enctype="multipart/form-data" >

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
                            <p><input name="sett_pass_original" type="password" value="" autocomplete="off" placeholder="Нынешний пароль" /></p>
                        </div>

                        <div class="sett_pole">
                            <p><label>Новый Пароль <span class="form_star err_pass">  </span> :</label></p>
                            <p><input name="sett_pass_one" type="password" value="" /></p>
                        </div>

                        <div class="sett_pole">
                            <p><label>Подтвердить пароль <span class="form_star err_pass">  </span> :</label></p>
                            <p><input name="sett_pass_two" type="password" value="" /></p>
                        </div>
                    </div>

                    <div class="lite_8 sett_right">

                        <div class="sett_pole_error">
                            <?php echo validation_errors(); ?>
                        </div>



                        <div class="sett_pole">
                            <p><label>Изменить аватар <span class="form_star "> </span> :</label></p>
                            <p><input type="file" name="sett_ava" /></p>

                        </div>
                        <div class="sett_pole">
                            sett_ava Приемущества зарегистрированого пользователя позволят вам войти в карту видимости сети, дадут возможность обмениваться сориемущества зарегистрированоьзователя позвойти в карту видимости сетадут возможность обмениваться сообаного пользователя позволят вам войти в карту видимости сети, дадут возможность обмениваться сообщениями
                        </div>
                        <div class="sett_pole">
                            <p><label>О себе:</label></p>
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
