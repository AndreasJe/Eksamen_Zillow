<?php
session_start();
require_once('globals.php');


try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}

try {
    $id = $_SESSION['user_id'];
    $currentpass = $_POST['current_password'];
    $newpass = $_POST['new_password'];
    $newpasshashed = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
    $confirmpass = $_POST['confirm_password'];
    //$email = $_POST['new_email'];


    $q = $db->prepare('SELECT * FROM users WHERE user_id = :id');
    $q->bindValue(':id', $id);
    $q->execute();
    $row = $q->fetch();
    echo 'Number of rows found: ' . $q->rowCount();



    if (password_verify($currentpass, $row['user_password'])) {
        // Check if password is same
        if ($newpass == $confirmpass) {
            $q2 = $db->prepare('UPDATE users SET user_password = :new_password WHERE user_id = :id');
            $q2->bindValue(':id', $id);
            $q2->bindValue(':new_password', $newpasshashed);
            $q2->execute();
            echo 'Number of rows changed: ' . $q->rowCount();
        } else {
            echo 'Password does not match.';
        }
    } else {
        echo 'Password is not correct.';
    }
    exit();
} catch (PDOException $ex) {
    echo $ex;
    echo 'No dice! ';
}
