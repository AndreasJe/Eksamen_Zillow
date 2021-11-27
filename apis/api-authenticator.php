<?php
require_once(__DIR__ . "/globals.php");



//Initial validation of the parameter
if (!isset($_POST['2fa_key'])) {
    echo "2fa-key is missing";
    exit();
}
if (strlen($_POST['2fa_key']) != 5) {
    echo "Key needs to be 5 digits";
    exit();
}



try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}

try {
    //Binding of variables
    $id = $_SESSION['user_id'];
    $phone = $_POST['phone_number'];
    $key = $_POST['2fa_key'];

    //Indentifying the 2FA code within the users table.
    $q = $db->prepare('SELECT * FROM users WHERE authentication_code = :authentication_code');
    $q->bindValue(':authentication_code', $key);
    $q->execute();
    $row = $q->fetch();

    // When found we bind a new 2FA code and the phone number
    if ($q->rowCount() > 0) {
        $new_authentication_code = bin2hex(random_bytes(5));

        $q2 = $db->prepare('UPDATE users SET authentication_code = :authentication_code, user_phone = :user_phone WHERE user_id = :id');
        $q2->bindValue(':id', $id);
        $q2->bindValue(':authentication_code', $new_authentication_code);
        $q2->bindValue(':user_phone', $phone);
        $q2->execute();
        // Success
        header('Content-Type: application/json');
        $response = ["info" => "Code is valid", "Users found" => $q->rowCount(), "Authentication_code" => "New authentication_code has been assigned"];
        echo json_encode($response);
    }
} catch (PDOException $ex) {
    echo json_encode($ex);
}