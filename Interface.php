<?php

//session_start();
include "Controllers/{$_GET['control']}.php";

$control = $_GET['method'];
$controller = new $_GET['control']();
$controller->$control($_FILES);


