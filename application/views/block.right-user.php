
    <aside class="lite_3">
<!-- Вывод зарегистрированого пользователя -->
        <?php if(isset($user_name)): ?>

            <div class="right_id">
                <div class="user_name"><span>Это Вы:</span> <?php echo $user_name; ?> </div>
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

<!-- Вывод НЕ зарегистрированого пользователя -->
        <?php else: ?>

            <div class="right_id">
                <div class="user_name"><span>Здравствуй</span> Гость</div>
                <div class="user_ava"><img src="<?=base_url()?>images/avatars/avatar.png" width="128" height="128"></div>
            </div>
            <nav>
                <ul><label>Для доступа необходимо:</label>
                    <li><a href="/private_messager/chat/registration">Зарегистрироваться</a></li>
                </ul>
            </nav>

        <?php endif; ?>

    </aside>
