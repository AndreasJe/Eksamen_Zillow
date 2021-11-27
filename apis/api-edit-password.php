<?php
session_start();
require_once(__DIR__ . "/globals.php");

// Validate password
if (!isset($_POST['new_password'])) {
    $error = "We need your password to create a user for you!";
    echo $error;
}
if (strlen($_POST['new_password']) < 2) {
    $error = "Password has to be a minimum of " . _PASSWORD_MIN_LEN . " characters";
    echo $error;
}
if (strlen($_POST['new_password']) > 22) {
    $error = "Password cant exceed " . _PASSWORD_MAX_LEN . " characters";
    echo $error;
}

try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}

if ($newpass == $confirmpass) {
    echo 'No dice! ';
    try {
        $id = 184;
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
        echo json_encode($ex);
        echo 'No dice! ';
    }
} else {
    echo 'Password does not match.';
}