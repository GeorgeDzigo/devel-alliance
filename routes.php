<?php

include 'Config/Router/Router.php';

$root = $_SERVER['DOCUMENT_ROOT'] . '/delliance';
$router = new Route();

$router->get('/', function() use($root) {

    include $root . '/public/index.php';
});