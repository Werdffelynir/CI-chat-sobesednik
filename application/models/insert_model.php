<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Insert_model Обработка дынных для Запии в БД
 */
class Insert_model extends CI_Model{

    /**
     * set_message() Метод записывает сообщения пользователя
     *
     * @param $user_id  ИД пользователя
     * @param $user_name  Имя пользователя
     * @param $mess Текст сообщения
     * @param $file Файл если имееться
     * @param $type Тип файла если имееться файл
     */
    function set_message($user_id, $user_name, $mess, $file, $type)
    {
        $add['user_id']   = $user_id;
        $add['user_name'] = $user_name;
        $add['message']   = (!empty($mess))? $mess : '';
        $add['file_type'] = (!empty($type))? $type : '';
        $add['file_name'] = (!empty($file))? $file : '';
        $add['file_url']  = (!empty($file))? base_url().'upload/'.$file : '';
        $add['datetime']  = time();
        $this->db->insert('message',$add);
    }

    /**
     * new_user($user) Метод записывает нового пользователя пошедшого регистрацию
     *
     * @param $user Логин нового пользователя
     */
    function new_user($user)
    {
        $add['login'] = $user['login'];
        $add['password'] = $user['password'];
        $add['name'] = $user['name'];
        $add['avatar'] = "avatar_guest.png";
        $add['territory'] = $user['territory'];
        $add['telephone'] = $user['phone'];
        $add['email'] = $user['email'];
        $add['info'] = "";
        $add['role'] = "1";
        $add['datetime'] = time();
        $add['friends'] = "";

        $this->db->insert('users',$add);
    }
    
} // END Class Insert_model