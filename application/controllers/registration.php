<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Registration - контролер регистрации нового пользоваеля
 */

class Registration extends CI_Controller{

    /**
     * Метод загружает необходимые переменные для вида.
     */
    function index()
    {
        $data["top_menu_1"] = "<a href=\"".base_url()."\">Отмена</a>";
        $data["top_menu_2"] = "<a class=\"user_login_btn\" href=\"#login\">Вход</a>";
        $data["top_login"] = true;

        $captcha = $this->new_captcha();

        $data['c_image'] = $captcha['image'];
        $this->session->set_userdata('c_word', $captcha['word']);

        // Загрузка вида страницы регистрации
        $this->tpl->view("registration", $data, 'no-user');
    }


    /**
     * new_captcha() Метод создания капчи
     *
     * @return array Масиив с переменными для вывода необходимых данных в виде
     */
    function new_captcha()
    {

        // Загрузка необходимых хелперов
        $this->load->helper('string');
        $this->load->helper('captcha');

        // Количество и тип символов на капче
        $string = random_string('numeric', 6);

        // Параметры капчи
        $vals = array(
            'word' => $string,
            'img_path' => './images/captcha/',
            'img_url' => base_url().'images/captcha/',
            'font_path' => './system/fonts/texb.ttf',
            'img_width' => 163,
            'img_height' => 26,
            'expiration' => 10
        );

        // Создание капчи
        $cap = create_captcha($vals);

        // Данные для вида
        return array(
            'image' => $cap['image'], // Изображение с кодом капчи
            'word' => $cap['word']    // символы в строке, дальше заносяться и шифруються в сессии
        );
    }


    /**
     * validation() Метод проверки валиднеости веденых данных при регистрации.
     * Метод используеться скриптом JS для AJAX
     *
     */
    function validation()
    {

        // Проверку начну с опреденения имеет ли пользователь имя..
        if(isset($_POST['reg_name']))
        {

            // Регулярные вырвжения для дальнейшей проверки
            $exp_rules = array(
                'login' => '|[a-z0-9_]{3,30}$|',
                'pass'  => '|^[\d\w]{3,30}$|',
                'email' => '|^[0-9a-z]+[-\._0-9a-z]*@[0-9a-z]+[-\._^0-9a-z]*[0-9a-z]+[\.]{1}[a-z]{2,6}$|'
            );

            // Проверка имени
            $check['name'] = ( !empty($_POST['reg_name']) ) ?
                strip_tags(trim($_POST['reg_name'])) : false;

            // Проверка логина
            $check['login'] = ( preg_match($exp_rules['login'], $_POST['reg_login']) ) ?
                strip_tags(trim($_POST['reg_login'])) : false;

            if($check['login'] != false)
            {
                $this->load->model("select_model");
                $all_users = $this->select_model->user_current($check['login']);

                $all_users_result = $all_users->result_array();
                if( !empty($all_users_result) ){
                    $check['login'] = false;
                }
            }

            // Проверка пароля
            $check['password'] = ( $_POST['reg_pass_one'] == $_POST['reg_pass_two'] &&
                preg_match($exp_rules['pass'], $_POST['reg_pass_one']) ) ?
                $_POST['reg_pass_one'] : false;

            // Проверка места
            $check['territory'] = ( !empty($_POST['reg_territory'])) ?
                strip_tags(trim($_POST['reg_territory'])) : 'не указано';

            // Проверка телефона
            $check['phone'] = ( !empty($_POST['reg_phone'])) ?
                strip_tags(trim($_POST['reg_phone'])) : 'не указано';

            // Проверка email
            $check['email'] = ( preg_match($exp_rules['email'], $_POST['reg_email']) ) ?
                $_POST['reg_email'] : false;

            // Проверка кода капчи
            $check['code'] = ( $_POST['reg_code'] === $this->session->userdata('c_word') ) ?
                true : false;

            // Проверка на ошибки и запись их в масив для уведомления пользователя.
            $valid_error = array();
            foreach($check as $key => $value){
                if($value == false){
                    $valid_error[$key] = "Не верно!";
                }
            }

            // Если ошибок нет еденично вносяться данные пользователя в сессию
            if(empty($valid_error))
            {
                $this->load->model("insert_model");
                $this->insert_model->new_user($check);


                $newuser = array(
                    'user_login'    => $check["login"],
                    'user_name'     => $check['name'],
                    'user_territory'=> $check["territory"],
                    'user_telephone'=> $check["phone"],
                    'user_email'    => $check["email"],
                    'user_role'     => "1",
                );

                $this->session->set_userdata($newuser);

                // Перенаправления пользователя в личный кабинет для дальнейшей настройки своего акаунта
                $valid_ok['redirect'] = base_url()."settings/";
                echo json_encode($valid_ok);
            }
            else
            {
                // Вывод о ошибках.
                echo json_encode($valid_error);
            }
        }

    }

} // END Class Registration


