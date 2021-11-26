<?php

session_start();
require_once(__DIR__ . "/globals.php");



// Validate User name

if (!isset($_POST['new_email']) && !isset($_POST['new_email'])) {
    _res(400, ['info' => 'Email required']);
    exit();
}
if (!filter_var($_POST['new_email'], FILTER_VALIDATE_EMAIL)) {
    _res(400, ['email is invalid']);
    exit();
}



//Testing DB-Connection to distinguish the errors.
try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}

// Checking whether or not the new email has been confirmed
$confirmEmail = $_POST['confirm_email'];
$newEmail =  $_POST['new_email'];
$id = $_SESSION['user_id'];

if ($newEmail == $confirmEmail) {
    //Handling Query
    try {
        $q = $db->prepare('UPDATE users SET user_email = :useremail  WHERE user_id = :id');
        $q->bindValue(':id', $id);
        $q->bindValue(':useremail', $_POST['new_email']);
        $q->execute();
        $row = $q->fetch();
        echo 'Email has been changed: ' . $q->rowCount();

        if ($q->rowCount() > 0) {
            //Binding a new verification key since we have a new email to confirm
            $verification_key = bin2hex(random_bytes(16));
            $id = $_SESSION['user_id'];

            $q2 = $db->prepare('UPDATE users SET verification_key = :vkey, verified = :verified WHERE user_id = :id');
            $q2->bindValue(':id', $id);
            $q2->bindValue(':vkey', $verification_key);
            $q2->bindValue(':verified', false);
            $q2->execute();
            echo "New verification key has been assigned";
        }

        $_SESSION['user_email'] = $_POST['new_email'];
    } catch (PDOException $ex) {
        echo $ex;
        echo 'No dice! ';
        exit();
    }
} else {
    _res(400, ['Emails dont match']);
}