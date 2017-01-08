<?php
if (!defined('MypRoject')) {
    echo 'Direct Access Not Allow';
    die();
}
class base_model extends DB
{
    public function __construct()
    {
        parent::__construct("");
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->exec("SET CHARACTER SET utf8");
    }
}
?> 