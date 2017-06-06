<?php
require_once '../../../wp-load.php';
$login = strip_tags(trim($_POST['login']));
$email = strip_tags(trim($_POST['email']));
$password = strip_tags(trim($_POST['password']));


$reg_result = object_to_array(wp_create_user($login, $password, $email));
//print_r(object_to_array(wp_create_user($login, $password, $email)));

if ($reg_result['errors']['empty_user_login']) {
    $result = 2;
    echo json_encode($result);
} elseif($reg_result['errors']['existing_user_login']) {
    $result = 3;
    echo json_encode($result);
} elseif($reg_result['errors']['existing_user_email']) {
    $result = 4;
    echo json_encode($result);
} else {
    $result = 1;
    echo json_encode($result);
}