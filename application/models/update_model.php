<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Update_model Обновление БД
 */

class Update_model extends CI_Model{

    /**
     * edit_user() Метод обновление пользовательских данных
     *
     * @param $data массив данных для обновления
     * @param $id ИД пользователя
     */
    function edit_user($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }


} // END Class Update_model