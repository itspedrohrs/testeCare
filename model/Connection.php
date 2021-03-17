<?php

include "./config.php";

class Connection
{
    public static $instance;

    public function __construct()
    {

    }

    public static function getInstance()
    {
        self::$instance = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME, "" . DB_USER . "", "" . DB_PASS . "");

        return self::$instance;
    }

}