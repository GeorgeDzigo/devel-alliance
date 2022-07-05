<?php
include 'Config/Router/Router.php';
include 'Config/Requests/Request.php';

$root = $_SERVER['DOCUMENT_ROOT'];

$router = new Router(new Request);

$router->get('/', function() use($root) {
    include 'pages/signup.php';
});

$router->post('/sign-up', function($request) {
    var_dump($_POST);
});