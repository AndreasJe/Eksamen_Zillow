<?php

require_once(__DIR__ . "/globals.php");
session_start();



// Validate User name

if (!isset($_POST['new_email']) && !isset($_POST['new_email'])) {
    send_400('Email required ');
    exit();
}
if (!filter_var($_POST['new_email'], FILTER_VALIDATE_EMAIL)) {
    send_400('Email is invalid ');
    exit();
}

//Testing DB-Connection to distinguish the errors.
try {
    $db = _db();
} catch (Exception $ex) {
    send_500('Database failed - System under maintainance');
    echo json_encode($ex);
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
            $q2->bindValue(':verified', 0);
            $q2->execute();
            send_200('Success: Email has been changed, and verification_key and verified has been updated. ');
        }

        $_SESSION['user_email'] = $_POST['new_email'];
    } catch (PDOException $ex) {
        echo json_encode($ex);
        send_500('System under maintainance - Query failed');
        exit();
    }
} else {
    send_400('Emails dont match');
}