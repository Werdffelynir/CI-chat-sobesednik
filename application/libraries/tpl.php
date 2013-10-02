<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class Tpl Библиотека для рабты с видами приложения
 * организация частей для определенных страниц
 *
 */
class Tpl {

    /**
     * view Метод работает по аналогии с стандартным методом view()
     * Загружает виды и параметры
     *
     *
     * @param string $tpl   Шаблон контента
     * @param array $data   Данные
     * @param string $block_right  Шаблон правого блока
     */
    public function view( $tpl='index', array $data = null, $block_right='user')
    {
        $CI =& get_instance();

        $CI->load->view("block.head.php", $data);
        $CI->load->view("block.top-login.php");
        $CI->load->view("block.top-u-persone.php");
        $CI->load->view("block.header.php");

        $CI->load->view("tpl.content.".$tpl.".php");

        $CI->load->view("block.right-".$block_right.".php");
        $CI->load->view("block.footer.php");

    }


} // End Class Tpl



