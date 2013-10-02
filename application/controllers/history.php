<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class History - Обработчик вывода истории сообщений
 */


class History extends CI_Controller{

    /**
     * Метод загружает необходимые переменные для виду.
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
            $data["top_menu_3"] = "<a href=\"".base_url()."\">Вернуться в чат</a>";

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
            $data["all_message"] = $this->monitor_message();

        // Если гость
        }else{

            $data["top_menu_1"] = "<a href=\"".base_url()."registration/\">Регистрация</a>";
            $data["top_menu_2"] = "<a class=\"user_login_btn\" href=\"#login\">Вход</a>";
            $data["top_login"] = true;
            $data["all_message"] = $this->monitor_message();

        }

        $this->tpl->view("history", $data, 'user');
    }



    /**
     * monitor_message() Метод загружающий сообщения.
     *
     * @return string возвращает строку с деревом сообщений
     */
    function monitor_message()
    {
        // модель выборки с БД
        $this->load->model("select_model");

        // Инициализация выборки сообщений. метод refresh() с параметром false возвращает все сообщения
        $refresh_data = $this->select_model->refresh(false);

        // Цыкл формирует дерево с сообщениями
        $to_monitor = '';
        foreach($refresh_data as $data_once){

            $avatar_curr = $this->select_model->user_current_once($data_once["user_id"], true);

            $to_monitor .= '<div class="mess_box full clear">';
            $to_monitor .= '<div class="first lite_1 u_ava" ><img src="'.base_url().'images/avatars/'.$avatar_curr['avatar'].'" width="48"></div>';
            $to_monitor .= '<div class="lite_11 mess_content">';
            $to_monitor .= '<div class="u_name">';
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

        return $to_monitor;

    }

} // END Class History


