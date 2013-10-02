<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Select_model Модель выборки данных с БД rules_valid_model
 */

class Select_model extends CI_Model{

    /**
     *
     * @param bool $to_day
     * @return mixed
     */
    public function refresh($to_day = true)
    {
        if($to_day==true){
            $this->db->where('datetime >', time() - 3600*24);
        }

        $result = $this->db->get("message");
        return $result->result_array();
    }

    /**
     *
     *
     * @param $en_login
     * @param null $en_password
     * @return mixed
     */
    public function user_current($en_login, $en_password = null)
    {
        $this->db->where('login', $en_login);

        if($en_password != null)
            $this->db->where('password', $en_password);

        return $this->db->get('users');
    }

    /**
     *
     *
     * @param $id
     * @param bool $id_t
     * @return mixed
     */
    public function user_current_once($id, $id_t = false)
    {
        if($id_t == true)
        {
            $this->db->where('id', $id);
        }
        else
        {
            $this->db->where('login', $id);
        }

        $result = $this->db->get('users');
        return $result->row_array();
    }

    
} // END Class Select_model