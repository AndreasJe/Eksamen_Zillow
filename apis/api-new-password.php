<?php
require_once("globals.php");

//Initial validation of the parameter
if (!isset($_GET['key'])) {
    echo 'Verification_Key is not present in Database - Create new user or contact your administrator';
    exit();
}
if (strlen($_GET['key']) != 32) {
    echo "mmm... suspicious (key is not 32 chars)";
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
        echo "Number of rows changed: " . $q->rowCount();
    } else {
        echo "ERROR: Password does not match.";
        exit();
    }
} catch (PDOException $ex) {
    echo $ex;
    echo "No dice! ";
}