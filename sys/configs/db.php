<?php
if (!defined('MypRoject')) {
    echo 'Direct Access Not Allow';
    die();
}
class DB extends PDO
{
    private $engine;
    private $host;
    private $database;
    private $username;
    private $password;

    public function __construct()
    {
        $this->engine   = "mysql";
        $this->host     = "localhost";
        $this->database = "bhavin";
        $this->username = "root";
        $this->password = '';

        $dsn = $this->engine . ":host=" . $this->host . ";dbname=" . $this->database;
        parent::__construct($dsn, $this->username, $this->password);
    }
}
?>