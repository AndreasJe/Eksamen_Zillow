<?php
require_once(__DIR__ . "/globals.php");

//Initial validation of the parameter
if (!isset($_GET['key'])) {
    send_400('mmm... suspicious (key is missing)');
    exit();
}
if (strlen($_GET['key']) != 32) {
    send_400('mmm... suspicious (key is not 32 chars)');
    exit();
}

//Testing DB-Connection to distinguish the errors.
try {
    $db = _db();
} catch (Exception $ex) {
    send_500('Database failed - System under maintainance');
    echo json_encode($ex);
}

try {
    //Binding of variables
    $key = $_GET['key'];

    //Updating the verification_key within the user's table.
    $q = $db->prepare('UPDATE users SET verified = :verified WHERE verification_key = :vkey');
    $q->bindValue(':vkey', $key);
    $q->bindValue(':verified', true);
    $q->execute();
    echo $q->rowCount() . 'users has been verified ';


    //Binding a new verification key if changes are made
    if ($q->rowCount() > 0) {
        $new_verification_key = bin2hex(random_bytes(16));
        $id = $_SESSION['user_id'];

        $q2 = $db->prepare('UPDATE users SET verification_key = :vkey WHERE user_id = :id');
        $q2->bindValue(':id', $id);
        $q2->bindValue(':vkey', $new_verification_key);
        $q2->execute();
        echo "New verification key has been assigned";
    }
} catch (PDOException $ex) {
    echo json_encode($ex);
    send_500('System under maintainance - Query failed');
    exit();
}