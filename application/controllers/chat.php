<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class Chat - Первичный контролер загрузчик.
 */

class Chat extends CI_Controller{

    /**
     * Метод загружает необходимые переменные для вида.
     * Определения пользователя
     */
    function index()
    {

        // модель выборки с БД
        $this->load->model("select_model");

        // Порсмотр в сессии текущего пользователя
        $user_info = $this->select_model->user_current_once($this->session->userdata('user_login'));

        // Если Пользователь имееться, зарегистирован
        if(!empty($user_info)){

            // Переменый топ меню
            $data["top_menu_1"] = "<a href=\"".base_url()."settings\">Настройки Акаута</a>";
            $data["top_menu_2"] = "<a href=\"".base_url()."chat/log_out\">Выход</a>";
            $data["top_menu_3"] = "<a href=\"".base_url()."history/\">Просмотреть историю сообщений</a>";

            // Переменные персональная информаця пользователя
            $data['user_login'] = $user_info['login'];
            $data['user_password'] = $user_info['password'];
            $data['user_name'] = $user_info['name'];
            $data['user_avatar'] = "<img src=\"".base_url()."images/avatars/".$user_info['avatar']."\" >";
            $data['user_territory'] = $user_info['territory'];
            $data['user_telephone'] = $user_info['telephone'];
            $data['user_email'] = $user_info['email'];
            $data['user_info'] = $user_info['info'];
            $data['user_role'] = $user_info['role'];
            $data['user_datetime'] = $user_info['datetime'];
            $data['user_friends'] = $user_info['friends'];

        // Если гость
        }else{

            $data["top_menu_1"] = "<a href=\"".base_url()."registration/\">Регистрация</a>";
            $data["top_menu_2"] = "<a class=\"user_login_btn\" href=\"#login\">Вход</a>";
            $data["top_login"] = true;

        }
        // Первичная загрузка сообщений, необходимо запустить здесь для определения позицый скрола.
        $data["all_message"] = $this->monitor_message(false);

        // Загрузка вида главной страницы
        $this->tpl->view("index", $data, 'user');
    }


    /**
     * monitor_message Метод загружающий сообщения.
     *
     * @param bool $e Выборка за текущий день по умочанию или false все
     * @return string если true выводит Echo. Если параметр false возвращает строку
     */
    function monitor_message($e=true)
    {
        // модель выборки с БД
        $this->load->model("select_model");

        // Инициализация выборки сообщений. метод refresh() по умочанию выберает сообщения за текущий день
        $refresh_data = $this->select_model->refresh();


        $count_db = $this->db->count_all('message');
        $count_db_now = $this->session->userdata('count_message');

        if($count_db == $count_db_now OR $e != 're'){
            $count_db_old = true;
        }else{
            $count_db_old = false;

        }
        $this->session->set_userdata('count_message', $count_db);

        // Цыкл формирует дерево с сообщениями
        $to_monitor = '<div class="mess_box_all_message">';
        foreach($refresh_data as $data_once){

            $avatar_curr = $this->select_model->user_current_once($data_once["user_id"], true);


            //echo "NAME ".$avatar_curr['name']." - ".base_url().'images/avatars/'.$avatar_curr['avatar'].'<br>';


            $to_monitor .= '<div class="mess_box full">';
            $to_monitor .= '<div class="first lite_1 u_ava user_personal_info" user-data="'.$avatar_curr['id'].'" ><img src="'.base_url().'images/avatars/'.$avatar_curr['avatar'].'" width="48"></div>';
            $to_monitor .= '<div class="lite_11 mess_content">';
            $to_monitor .= '<div class="u_name user_personal_info" user-data="'.$avatar_curr['id'].'">';
            $to_monitor .= $data_once["user_name"].' <span class="u_time">'. date("H:i:s", $data_once["datetime"]).'</span>';
            $to_monitor .= '</div>';
            $to_monitor .= '<div class="u_mess">'.nl2br($data_once["message"]).'</div>';

            // Если имееться файл с определенным типом "image"
            if(!empty($data_once["file_name"]) AND $data_once["file_type"] == "image"){
                $to_monitor .= '<div class="u_image">';
                $to_monitor .= '    <a id="fboximg" data-fancybox-group="chat-img"  href="'.base_url().'upload/images/'.$data_once["file_name"].'" > <img src="'.base_url().'upload/images/'.$data_once["file_name"].'" > </a>';
                $to_monitor .= '</div>';
            }

            // Если имееться файл с определенным типом "file". В нутри в зависимости от пользователя
            // (гость или зарегистированый) выводятся соотвектстующие данные
            if($user_name = $this->session->userdata('user_name')){
                if(!empty($data_once["file_name"]) AND $data_once["file_type"] == "file"){
                    $to_monitor .= '<div class="u_file">';
                    $to_monitor .= '    <a href="'.base_url().'download/'.$data_once["file_name"].'">'.$data_once["file_name"].'</a>';
                    $to_monitor .= '</div>';
                }
            }
            else
            {
                if(!empty($data_once["file_name"]) AND $data_once["file_type"] == "file"){
                    $to_monitor .= '<div class="u_file">';
                    $to_monitor .=  $data_once["file_name"];
                    $to_monitor .= '</div> <span class="u_file_no_login">Вы должны быть зарегестированы что бы скачивать файлы</span>';
                }
            }

            $to_monitor .= '</div>';
            $to_monitor .= '</div>';

        }
        $to_monitor .= '</div>';


        if($e)
        {
            if($count_db_old){
                echo "old_db";

            }else{
                echo $to_monitor;
            }
        }else{
            return $to_monitor;
        }


    }


    /**
     *
     * login() Провека и создания сесии для пользователя
     * Метод работает с AJAX js скриптом
     *
     * @return bool
     */
    function login()
    {
        // ввыеденые пользователем логин и пароль
        $en_login = $this->input->post('en_login');
        $en_password = $this->input->post('en_password');

        // модель выборки с БД
        $this->load->model('select_model');

        // Проверка пользователя
        $query_user = $this->select_model->user_current($en_login, $en_password);

        // если польователь найден, осуществляеться создание сесии
        if($query_user->num_rows() > 0)
        {
            $user_id = $query_user->result_array();

            $newdata = array(
                'user_id'       => $user_id[0]["id"],
                'user_login'    => $user_id[0]["login"],
                'user_name'     => $user_id[0]["name"],
                'user_avatar'   => $user_id[0]["avatar"],
                'user_territory'=> $user_id[0]["territory"],
                'user_telephone'=> $user_id[0]["telephone"],
                'user_email'    => $user_id[0]["email"],
                'user_info'     => $user_id[0]["info"],
                'user_role'     => $user_id[0]["role"],
                'user_datetime' => $user_id[0]["datetime"]
            );

            $this->session->set_userdata($newdata);

            // Возвращает в скрипт JS адрес для редиректа
            echo base_url();
        }
        else
        {
            // Возвращает сообщения о ошибке, не верном логине или пароле
            echo "log_error";
            return FALSE;
        }

    }


    /**
     * log_out Метод выхода с приложения.
     * Осуществляеться уничтожением сессии и последующим редиректом
     *
     */
    function log_out()
    {
        $delele_data = array(
            'user_id'       => '',
            'user_login'    => '',
            'user_name'     => '',
            'user_avatar'   => '',
            'user_territory'=> '',
            'user_telephone'=> '',
            'user_email'    => '',
            'user_info'     => '',
            'user_role'     => '',
            'user_datetime' => ''
        );

        $this->session->unset_userdata($delele_data);
        redirect('/');
    }


    /**
     * setMessage() Метод Проверки веденного сообщения пользователем, прикрепленных фалов
     * С последующей записб в БД и обновлением блока сообщений. Проискодит посредством AJAX
     *
     *
     */
    function setMessage()
    {
        // модель выборки с БД
        $this->load->model("select_model");

        // Даные текущего пользователя user_login
        $user_info = $this->select_model->user_current_once($this->session->userdata('user_login'));

        $send_id = $user_info['id'];
        $send_name = $user_info['name'];

        // Сообщение пользователя
        $send_message = $this->input->post('send_message');

        // Когда есть даные
        if(!empty($send_message) OR !empty($_FILES['send_file']['name']))
        {


            // Фильтрация введеных HTML символов, кроми '<b><u><i>'
            $send_message = strip_tags($send_message, '<b><u><i>');

            $upload = '';

            // Пользователь передает файлы
            if (!empty($_FILES['send_file']['name'])) {

                // Все без ошибок
                if ($_FILES['send_file']['error'] == 0) {

                    // Если файл изображение. Переноситься он в соответствующий каталог
                    if (preg_match("/(?:jp(?:e?g|e|2)|gif|png|tiff?|bmp|ico)$/i ",$_FILES['send_file']['type']))
                    {
                        move_uploaded_file($_FILES["send_file"]["tmp_name"], FCPATH .'upload'. DIRECTORY_SEPARATOR .'images'. DIRECTORY_SEPARATOR . $_FILES["send_file"]["name"]);
                        $send_file_type = "image";
                    }

                    // Если файл документ или текст или лог-файл. Переноситься он в соответствующий каталог
                    elseif(preg_match("/(?:msword|officedocument|text|pdf|octet-stream)$/i ",$_FILES['send_file']['type']))
                    {
                        move_uploaded_file($_FILES["send_file"]["tmp_name"], FCPATH .'upload'. DIRECTORY_SEPARATOR .'files'. DIRECTORY_SEPARATOR . $_FILES["send_file"]["name"]);
                        $send_file_type = "file";
                    }

                    // Если файл архив. Переноситься он в соответствующий каталог
                    elseif(preg_match("/(?:zip|rar)$/i ",$_FILES['send_file']['type']))
                    {
                        move_uploaded_file($_FILES["send_file"]["tmp_name"], FCPATH .'upload'. DIRECTORY_SEPARATOR .'files'. DIRECTORY_SEPARATOR . $_FILES["send_file"]["name"]);
                        $send_file_type = "file";
                    }

                    $upload = $_FILES['send_file']['name'];
                }
            }

            // Загрузка файла с использованием CURL библиотеки
            $postdata = array(
                'user_name' => $send_name,
                'user_message' => $send_message);

            if (!empty($upload)) $postdata['user_upload'] = "@" . $upload;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, base_url().'');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
            curl_exec($ch);
            curl_close($ch);

            // Загрузка модели записи в БД
            $this->load->model('insert_model');

            // Вызов метода записии в БД
            $this->insert_model->set_message($send_id, $send_name, $send_message, $upload, $send_file_type);

        }

        // Переадрисация на главную страницу
        //redirect(base_url());
    }



    function user_info($id){

            // модель выборки с БД
            $this->load->model("select_model");

            // Даные текущего пользователя user_login
            $user_info = $this->select_model->user_current_once($id, true);


            $send["name"] = $user_info['name'];
            $send["avatar"] = '<img src="'.base_url().'images/avatars/'.$user_info['avatar'].'" height="128" width="128">';
            $send["territory"] = $user_info['territory'];
            $send["email"] = $user_info['email'];
            $send["telephone"] = $user_info['telephone'];
            $send["info"] = $user_info['info'];

            echo json_encode($send);


    }



} // END Class Chat