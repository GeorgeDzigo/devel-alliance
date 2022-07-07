<?php
session_start();

include 'Config/Router/Router.php';
include 'Config/Requests/Request.php';
include 'Config/Models/User.php';

$root = $_SERVER['DOCUMENT_ROOT'];

$route = new Router(new Request);

$route->post('/delete', function() {
    if(isset($_POST['user_id'])) {
        $user = new User();
        $user->delete('id', $_POST['user_id']);

        return json_encode(['User has been deleted']);
    }

    return header("HTTP/1.0 404 Not Found");
});

$route->get('/', function () use ($root) {
    $user = new User();
    $users = $user->all();

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
    $exist = $user->where('email', $_POST['email']);
    if(count($exist)) {
        return json_encode([false, "User with that email already exists"]);
    }

    $data = [
        'firstname' => $_POST['firstname'],
        'lastname' => $_POST['lastname'],
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ];

    if ($res = $user->create($data)) {
        return json_encode([true, $res]);
    }

    return header("HTTP/1.0 500 Internal Error");
});
