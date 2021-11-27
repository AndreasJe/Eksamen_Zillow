<?php
require_once(__DIR__ . "/globals.php");

//Initial validation of the parameter
if (!isset($_POST['user_email'])) {
    echo "We need an email to find your user";
    exit();
}



try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}


try {
    $email = $_POST['user_email'];


    $q = $db->prepare('SELECT * FROM users WHERE user_email = :email');
    $q->bindValue(':email', $email);
    $q->execute();
    $row = $q->fetch();
    echo 'Number of users found: ' . $q->rowCount();
    $verification_key = $row['forgot_pass_key'];


    if (!isset($row['forgot_pass_key'])) {
        echo 'Verification_Key is not present in Database - Create new user or contact your administrator';
        exit();
    }
    if (strlen($row['forgot_pass_key']) != 32) {
        echo "mmm... suspicious (key is not 32 chars)";
        exit();
    }


    $_to_email =  $_POST['user_email'];
    $_message = file_get_contents('../emails/ForgotPassword_Template.html');
    $_subject = "Reset your password";
    $_message = str_replace("%verification_key%", $verification_key, $_message);

    require_once(__DIR__ . "/../private/send-email.php");

    exit();
} catch (PDOException $ex) {
    http_response_code(500);
    $error = 'Something went wrong';
    echo json_encode($ex);
}