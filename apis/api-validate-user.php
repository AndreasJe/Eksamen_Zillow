<?php
require_once(__DIR__ . "globals.php");

//Initial validation of the parameter
if (!isset($_GET['key'])) {
    echo "mmm... suspicious (key is missing)";
    exit();
}
if (strlen($_GET['key']) != 32) {
    echo "mmm... suspicious (key is not 32 chars)";
    exit();
}



try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}

try {
    //Binding of variables
    $key = $_GET['key'];
    $verified = "1";

    $q = $db->prepare('UPDATE users SET verified = :verified WHERE verification_key = :vkey');
    $q->bindValue(':vkey', $key);
    $q->bindValue(':verified', $verified);
    $q->execute();
    echo "Your user has now been verified!";
} catch (PDOException $ex) {
    echo $ex;
    echo 'No dice! ';
}