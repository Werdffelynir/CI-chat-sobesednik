
    <section class="first lite_9">
        <?php if(isset($top_menu_3)): ?>
            <div class="history_box  grad_01"><?=$top_menu_3?></div>
        <?php endif; ?>

        <audio id="bells">
            <source src="<?=base_url()?>js/sound/new_message.mp3"></source>
            <source src="<?=base_url()?>js/sound/new_message.ogg"></source>
        </audio>

        <div id="scrollDiv" class="monitor_scroll">
            <div id="scrollDivM" class="monitor">


                <?php echo $all_message; ?>


            </div>
        </div>
        <div class="chatform">
            <?php if(isset($user_name)): ?>
                <form id="form_message" name="" action="<?=base_url()?>chat/setMessage" method="post" enctype="multipart/form-data">

                    <textarea class="areaScroll" name="send_message"></textarea>

                    <div class="type_upload_file_box">
                        <input name="send_file" type="file" value="Загрузить" />
                    </div>

                    <span class="type_upload_file_btn ">Файл / Фото</span>
                    <input class="this_url " type="text" hidden="hidden" value="<?=base_url()?>" />
                    <input class="type_submit_message " type="submit" value="Отправить" />
                </form>
            <?php else: ?>
                <div class="no_form">Для возможности отправления сообщений и просмотра фалов, Вам необходимо <a class="user_login_btn" href="#login\" >Войти</a> или <a href="<?php echo base_url(); ?>chat/registration">Зарегистироваться</a>.</div>
            <?php endif; ?>
        </div>
    </section>