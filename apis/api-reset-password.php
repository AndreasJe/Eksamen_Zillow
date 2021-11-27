<?php
require_once("globals.php");
session_start();

//Initial validation of the parameter
if (!isset($_GET['key'])) {
    echo 'key is not present';
    exit();
}
if (strlen($_GET['key']) != 32) {
    echo "mmm... suspicious (key is not 32 chars)";
    exit();
}
if (!isset($_POST['new_password'])) {
    echo "new_password is needed";
    exit();
}
if (!isset($_POST['confirm_password'])) {
    echo "confirm_password is needed";
    exit();
}



//Initial validation of the database connection, before we proceed
try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}


//Verification_key is used 
try {
    $pass_key = $_GET['key'];
    $newpass = $_POST['new_password'];
    $newpasshashed = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
    $confirmpass = $_POST['confirm_password'];


    if ($newpass == $confirmpass) {
        $q = $db->prepare('UPDATE users SET user_password = :new_password WHERE forgot_pass_key = :pass_key');
        $q->bindValue(':pass_key', $pass_key);
        $q->bindValue(':new_password', $newpasshashed);
        $q->execute();
        echo "Number of users updated: " . $q->rowCount();


        if ($q->rowCount() > 0) {
            //Binding a new verification key after use
            $new_verification_key = bin2hex(random_bytes(16));

            $q2 = $db->prepare('UPDATE users SET forgot_pass_key = :new_pass_key WHERE forgot_pass_key = :pass_key');
            $q->bindValue(':pass_key', $pass_key);
            $q2->bindValue(':new_pass_key', $new_verification_key);
            $q2->execute();
            echo "New verification key has been assigned";
            exit();
        } else {

            echo "Signing new key failed";
            exit();
        }
    } else {
        echo "ERROR: Password does not match.";
        exit();
    }
} catch (PDOException $ex) {
    http_response_code(500);
    $error = 'Something went wrong';
    echo json_encode($ex);
}