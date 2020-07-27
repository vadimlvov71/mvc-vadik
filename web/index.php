<?php
//require_once("../classes/Routing.php");

spl_autoload_register(function ($class_name) {
    include '../classes/'.$class_name . '.php';
});

Routing::setRoute($_SERVER['REQUEST_URI']);
echo $_SERVER['REQUEST_URI'];
?>
