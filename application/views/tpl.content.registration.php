
    <section class="first lite_9">

        <form id="new_user_form" name="" action="<?=base_url()?>registration/validation/" method="post">
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
    
