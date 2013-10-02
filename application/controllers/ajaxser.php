<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajaxser {

    function method()
    {

        //присваивает идентификатор записи
        $record_id = $_POST[""];

        //внутри папки ystem/application/models создаются модели на основе процедуры.
        $this->load->model("");

        //получаем записи из базы данных
        $results = $this->records->get_record($record_id);

    }

}