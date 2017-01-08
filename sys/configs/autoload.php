<?php
if (!defined('MypRoject')) {
    echo 'Direct Access Not Allow';
    die();
}
require_once ('paths.php');
require_once('db.php');
function loadModels($className)
{
    if (file_exists('../sys/models/' . $className . '.php')) {
        require_once '../sys/models/' . $className . '.php';
    }
}
spl_autoload_register("loadModels");