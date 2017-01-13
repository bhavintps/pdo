<?php
define('MypRoject', TRUE);
require_once('../sys/configs/autoload.php');
    	$modelHandel = new model();
        $table='abc';
    	$data = $modelHandel->select_table($table);
        var_dump($data);