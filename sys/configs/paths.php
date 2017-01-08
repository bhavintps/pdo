<?php
if (!defined('MypRoject')) {
    echo 'Direct Access Not Allow';
    die();
}
define("SERVER_NAME","http://".$_SERVER['SERVER_NAME']);
define("BASE_URL",SERVER_NAME.str_replace(str_replace('.php',"",basename($_SERVER['PHP_SELF'])),"",str_replace(basename($_SERVER['PHP_SELF']),"",$_SERVER['REQUEST_URI'])));
define("BASE_PATH",dirname(dirname(__FILE__))."/");
define("MODELS_PATH",BASE_PATH."models/");