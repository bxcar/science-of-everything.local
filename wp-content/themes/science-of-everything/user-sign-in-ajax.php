<?php
require_once '../../../wp-load.php';
$login = strip_tags(trim($_POST['login']));
$password = strip_tags(trim($_POST['password']));

if (login_wordpress($login, $password)) {
    $result = 1;
    echo json_encode($result);
} else {
    $result = 0;
    echo json_encode($result);
}