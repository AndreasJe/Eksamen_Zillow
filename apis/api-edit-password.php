<?php
session_start();
require_once(__DIR__ . "/globals.php");

// Validate password
if (!isset($_POST['new_password'])) {
    send_400('Password is required');
    $error = "We need your password to create a user for you!";
}
if (strlen($_POST['new_password']) < 2) {
    send_400('Password has to be a minimum of 2 characters');
    $error = "Password has to be a minimum of " . _PASSWORD_MIN_LEN . " characters";
}
if (strlen($_POST['new_password']) > 22) {
    send_400('Password cant exceed 22 characters');
    $error = "Password cant exceed " . _PASSWORD_MAX_LEN . " characters";
}

try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}

if ($newpass == $confirmpass) {
    echo 'No dice! ';
    try {
        $id = $_SESSION['user_id'];
        $newpass = $_POST['new_password'];
        $newpasshashed = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $confirmpass = $_POST['confirm_password'];
        $q = $db->prepare('UPDATE users SET user_password = :new_password WHERE user_id = :id');
        $q->bindValue(':id', $id);
        $q->bindValue(':new_password', $newpasshashed);
        $q->execute();
        echo 'Number of users changed: ' . $q->rowCount();

        exit();
    } catch (PDOException $ex) {
        echo $ex;
        echo 'No dice! ';
    }
} else {
    echo 'Password does not match.';
}