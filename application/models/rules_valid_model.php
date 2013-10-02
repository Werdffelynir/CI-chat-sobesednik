<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Rules_valid_model Модель c свойствами правил, для последующей валидации данных
 */

class Rules_valid_model extends CI_Model{

    /**
     * Свойство правил для валидации формы ЛК настроек
     *
     * @var array
     */
    public $settings_rules = array(
        array(
            'field'   => 'sett_name',
            'label'   => 'Ваше полное имя',
            'rules'   => 'required|min_length[3]|xss_clean'
        ),
        array(
            'field'   => 'sett_email',
            'label'   => 'Ваш Email',
            'rules'   => 'required|valid_email'
        ),
        array(
            'field'   => 'sett_territory',
            'label'   => 'С какой вы планеты',
            'rules'   => 'xss_clean'
        ),
        array(
            'field'   => 'sett_phone',
            'label'   => 'Ваш телефон',
            'rules'   => 'xss_clean'
        ),
        array(
            'field'   => 'sett_login',
            'label'   => 'Логин (для входа)',
            'rules'   => 'required|alpha_dash|min_length[3]'
        ),
        array(
            'field'   => 'sett_pass_original',
            'label'   => 'Нынешний пароль',
            'rules'   => 'alpha_dash|min_length[3]'
        ),
        array(
            'field'   => 'sett_pass_one',
            'label'   => 'Новый пароль',
            'rules'   => 'alpha_dash|min_length[3]'
        ),
        array(
            'field'   => 'sett_pass_two',
            'label'   => 'Новый пароль еще раз',
            'rules'   => 'alpha_dash|min_length[3]'
        ),
        array(
            'field'   => 'sett_info',
            'label'   => 'Информация о себе',
            'rules'   => 'xss_clean'
        )

    );





}
