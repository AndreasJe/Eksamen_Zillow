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
    _res(500, ['info' => 'Database failed - System under maintainance', 'error' => __LINE__]);
}

//Executing Content
try {

    //Binding variables
    $id = $_SESSION['user_id'];
    //Indentifying the 2FA code within the users table.
    $q = $db->prepare('SELECT * FROM users WHERE authentication_code = :authentication_code');
    $q->bindValue(':authentication_code', $_POST['2fa_key']);
    $q->execute();
    $row = $q->fetch();

    // When found and verified - we bind the new phone number & a new 2FA code using a transaction
    if (!empty($row)) {
        try {
            $new_authentication_code = bin2hex(random_bytes(5));

            $db->beginTransaction();

            $update = $db->prepare('UPDATE users SET user_phone = :phone WHERE user_id = :user_id');
            $update->bindValue(':user_phone', $_POST['phone_number']);
            $update->bindValue(':user_id', $id);


            $update = $db->prepare('UPDATE users SET authentication_code = :authentication_code WHERE user_id = :user_id');
            $update->bindValue(':user_id', $id);
            $update->bindValue(':authentication_code', $new_authentication_code);

            $db->commit();
            $update->execute();
            send_200('Success, your phone has been verified and registered');
        } catch (PDOException $ex) {
            $db->rollBack();
            echo json_encode($ex);
            send_400('Something went wrong in the transaction');
        }
    } else {
        send_400('Your code is wrong');
        exit();
    }
} catch (PDOException $ex) {
    echo json_encode($ex);
    send_500('System under maintainance');
}

//Response 500 means server error
function send_500($error_message)
{
    header('Content-Type: application/json');
    http_response_code(500);
    $response = ["Error" => $error_message];
    echo json_encode($response);
    exit();
}

//Response 400 means Client error
function send_400($error_message)
{
    header('Content-Type: application/json');
    http_response_code(400);
    $response = ["Error" => $error_message];
    echo json_encode($response);
    exit();
}

//Response 400 means OK error
function send_200($error_message)
{
    header('Content-Type: application/json');
    http_response_code(200);
    $response = ["Info" => $error_message];
    echo json_encode($response);
    exit();
}