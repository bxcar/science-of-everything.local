<?php
require_once '../../../wp-load.php';
$email = strip_tags(trim($_POST['email']));

//$user = get_user_by('email', $email);
$user = wp_lostpassword_url();
print_r($user);
/*
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
}*/