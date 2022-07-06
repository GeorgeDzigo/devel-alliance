<?php
session_start();

include 'Config/Router/Router.php';
include 'Config/Requests/Request.php';
include 'Config/Models/User.php';

$root = $_SERVER['DOCUMENT_ROOT'];

$route = new Router(new Request);

$route->get('/', function () use ($root) {
    include 'pages/signup.php';
});

$route->post('/setname', function() {
    $_SESSION['firstname'] = $_POST['firstname'];
});

$route->get('/welcome', function () {
    if (isset($_SESSION['firstname'])) {
        $name = $_SESSION['firstname'];
        include 'pages/welcome.php';
    }

    return header("HTTP/1.0 404 Not Found");
});

$route->post('/sign-up', function ($request) {
    $user = new User();
    $data = [
        'firstname' => $_POST['firstname'],
        'lastname' => $_POST['lastname'],
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ];

    if ($res = $user->create($data)) {
        return $res;
    }

    return header("HTTP/1.0 500 Internal Error");
});
