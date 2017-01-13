<?php
if(!defined('MypRoject')){
    echo 'Direct Access Not Allow';
    die();
}
require_once('paths.php');
require_once('db.php');
function loadModels($className)
{
    if (file_exists(MODELS_PATH.$className.'.php')) {
        require_once MODELS_PATH.$className.'.php';
    }
}
spl_autoload_register("loadModels");