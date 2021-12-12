<?php
session_start();
require_once(__DIR__ . "/globals.php");

//Initial validation of the parameter
if (!isset($_POST['2fa_key'])) {
    send_400('2fa-key is missing!');
    exit();
}
if (strlen($_POST['2fa_key']) != 5) {
    send_400('Key needs to be 5 digits!');
    exit();
}

//Initial validation of database
try {
    $db = _db();
} catch (Exception $ex) {
    send_500('Database failed - System under maintainance');
    echo json_encode($ex);
}

//Executing Content
try {

    //Indentifying the 2FA code within the users table.
    $q = $db->prepare('SELECT * FROM users WHERE authentication_code = :authentication_code');
    $q->bindValue(':authentication_code', $_POST['2fa_key']);
    $q->execute();
    $row = $q->fetch();

    // When found and verified - we bind the new phone number & a new 2FA code using a transaction
    if (!empty($row)) {
        try {
            //Binding variables
            $id = $_SESSION['user_id'];
            $phone = $_POST['phone_number'];
            $new_authentication_code = bin2hex(random_bytes(5));


            $update1 = $db->prepare('UPDATE users SET user_phone = :user_phone WHERE user_id = :user_id');
            $update1->bindValue(':user_phone', $phone);
            $update1->bindValue(':user_id', $id);
            $update1->execute();


            $update2 = $db->prepare('UPDATE users SET authentication_code = :authentication_code WHERE user_id = :user_id');
            $update2->bindValue(':user_id', $id);
            $update2->bindValue(':authentication_code', $new_authentication_code);
            $update2->execute();

            $_SESSION['user_id'] = $_POST['phone_number'];
            send_200('Success, your phone has been verified and registered');
        } catch (PDOException $ex) {
            echo json_encode($ex);
            send_400('Something went wrong in the transaction');
        }
    } else {
        send_400('Your code is wrong');
        exit();
    }
} catch (PDOException $ex) {
    send_500($ex);
}