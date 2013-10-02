<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class Chat - Контролер загружающий страницу настроек, личный кабинет.
 */

class Settings extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        // Загрузка библиотеки валидации.
        //$this->load->library("form_validation");

    }


    /**
     * Метод загружает необходимые переменные для вида.
     * Определения пользователя
     */
    function index()
    {
        // модели выборки и обновления БД
        $this->load->model("select_model");
        $this->load->model("update_model");

        // Загрузка библиотеки валидации.
        $this->load->library('form_validation');

        // Загрузка маодели правил
        $this->load->model("rules_valid_model");



        // Порсмотр в сессии текущего пользователя
        $user_info = $this->select_model->user_current_once($this->session->userdata('user_login'));

        $this->update_user($user_info);

        // Если Пользователь имееться, зарегистирован
        if(!empty($user_info)){

            // Переменый топ меню
            $data["top_menu_1"] = "<a href=\"".base_url()."\" >В Сообщество</a>";
            $data["top_menu_2"] = "<a href=\"chat/log_out\">Выход</a>";

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

        }
        // Если гость, отправляеться обратно на главную
        else
        {
            redirect(base_url());
        }

        // Загрузка вида страницы ЛК
        $this->tpl->view("settings", $data, 'user');

    }





    function update_user($user_info){



        // Если Пользователь имееться, зарегистирован и есть данные для работы с БД
        if(!empty($user_info) && isset($_POST['setting_update']) )
        {

            // Обновление аватара
            if($_FILES['sett_ava']){
                $config['upload_path'] = './upload/trash/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']	= '1000';
                $config['encrypt_name']	= TRUE;
                $config['remove_spaces']	= TRUE;

                $this->load->library('upload', $config);
                $this->upload->do_upload("sett_ava");
                $image_data = $this->upload->data();

                // Конфигурация для Изминения размеров изобр. Аватара
                $config_f = array(
                    'image_library' => 'gd2',
                    'source_image' => $image_data['full_path'],
                    'new_image' => APPPATH.'../images/avatars',
                    //'create_thumb' => TRUE,
                    'maintain_ratio' => TRUE,
                    'width' => 128,
                    'height' => 128
                );
                // Вызов метода изминения размера изобр.
                $this->resize_ava($config_f);

                // записи в БД
                if(!empty($image_data['file_name']))
                    $data_upd_user["avatar"] = $image_data['file_name'];
            }

            $rules_sett = $this->rules_valid_model->settings_rules;

            //$this->form_validation->set_rules('sett_name', 'Имя пользователя', 'required');
            $this->form_validation->set_rules($rules_sett);

            $check = $this->form_validation->run();

            if($check)
            {
                if(!empty($_POST["sett_name"]))
                    $data_upd_user["name"] = $this->input->post("sett_name");

                if(!empty($_POST["sett_email"]))
                    $data_upd_user["email"] = $this->input->post("sett_email");

                if(!empty($_POST["sett_territory"]))
                    $data_upd_user["territory"] = $this->input->post("sett_territory");

                if(!empty($_POST["sett_phone"]))
                    $data_upd_user["telephone"] = $this->input->post("sett_phone");

                if(!empty($_POST["sett_login"]))
                    $data_upd_user["login"] = $this->input->post("sett_login");

                if(!empty($_POST["sett_info"]))
                    $data_upd_user["info"] = $this->input->post("sett_info");

                if(!empty($_POST["sett_pass_one"]) AND
                    !empty($_POST["sett_pass_two"]) AND
                    !empty($_POST["sett_pass_original"]))
                {
                    if($_POST["sett_pass_one"] == $_POST["sett_pass_two"] AND
                        $_POST["sett_pass_original"] == $user_info["password"] )
                    {
                        $data_upd_user["password"] = $this->input->post("sett_pass_one");
                    }

                }

                // Обновление запии в БД
                $this->update_model->edit_user($data_upd_user, $user_info["id"]);
                // Перезагрузка БД
                redirect(base_url().'settings/');
            }
            else
            {

            }

        }




    }












    /**
     * user_update_data() Метод обновление измененных даных пользователем.
     *
     *
     */
    function user_update_data()
    {
        // модели выборки и обновления БД
        $this->load->model("select_model");
        $this->load->model("update_model");

        // Загрузка библиотеки валидации.
        //$this->load->library("form_validation");

        // Загрузка маодели правил
        $this->load->model("rules_valid_model");

        // Порсмотр в сессии текущего пользователя
        $user_info = $this->select_model->user_current_once($this->session->userdata('user_login'));

        // Если Пользователь имееться, зарегистирован и есть данные для работы с БД
        if(!empty($user_info) && isset($_POST['setting_update']) )
        {

            // Обновление аватара
            if($_FILES['sett_ava']){
                $config['upload_path'] = './upload/trash/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']	= '1000';
                $config['encrypt_name']	= TRUE;
                $config['remove_spaces']	= TRUE;

                $this->load->library('upload', $config);
                $this->upload->do_upload("sett_ava");
                $image_data = $this->upload->data();

                // Конфигурация для Изминения размеров изобр. Аватара
                $config_f = array(
                    'image_library' => 'gd2',
                    'source_image' => $image_data['full_path'],
                    'new_image' => APPPATH.'../images/avatars',
                    //'create_thumb' => TRUE,
                    'maintain_ratio' => TRUE,
                    'width' => 128,
                    'height' => 128
                );
                // Вызов метода изминения размера изобр.
                $this->resize_ava($config_f);

                // записи в БД
                if(!empty($image_data['file_name']))
                    $data["avatar"] = $image_data['file_name'];
            }



            $rules_sett = $this->rules_valid_model->settings_rules;
            $this->form_validation->set_rules($rules_sett);
            $check = $this->form_validation->run();

            if($check)
            {
                if(!empty($_POST["sett_name"]))
                    $data["name"] = $this->input->post("sett_name");

                if(!empty($_POST["sett_email"]))
                    $data["email"] = $this->input->post("sett_email");

                if(!empty($_POST["sett_territory"]))
                    $data["territory"] = $this->input->post("sett_territory");

                if(!empty($_POST["sett_phone"]))
                    $data["telephone"] = $this->input->post("sett_phone");

                if(!empty($_POST["sett_login"]))
                    $data["login"] = $this->input->post("sett_login");

                if(!empty($_POST["sett_info"]))
                    $data["info"] = $this->input->post("sett_info");

                if(!empty($_POST["sett_pass_one"]) AND
                   !empty($_POST["sett_pass_two"]) AND
                   !empty($_POST["sett_pass_original"]))
                {
                    if($_POST["sett_pass_one"] == $_POST["sett_pass_two"] AND
                       $_POST["sett_pass_original"] == $user_info["password"] )
                    {
                        $data["password"] = $this->input->post("sett_pass_one");
                    }

                }
            }
            else
            {

            }

            var_dump($data);
            // Обновление запии в БД
            //$this->update_model->edit_user($data, $user_info["id"]);
        }

        // Перезагрузка БД
        //redirect(base_url().'settings/');
    }

    /**
     * resize_ava() Метод библиотеки image_lib для работыс изображениями,
     * использую метод изминения размера
     *
     * @param $data Конфигурация для изминений.
     */
    function resize_ava($data){
        $this->load->library('image_lib', $data);
        $this->image_lib->resize();
    }




} // END Class Settings