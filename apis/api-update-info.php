<?php
session_start();
require_once('globals.php');


//Testing DB-Connection to distinguish the errors.
try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}

//Handling Query
if (!empty($_POST['new_name']) && !empty($_POST['new_email'])) {
    try {


        //Internal Validation
        if (empty($_POST['new_name'])) {
            echo 'You need to enter a new_name for your account';
            exit();
        }
        if (strlen($_POST['new_name']) > 22) {
            echo "You name needs to be less than 22 characters";
            exit();
        }
        if (empty($_POST['new_email'])) {
            echo 'You need to enter a new_email for your account';
            exit();
        }


        $id = $_SESSION['user_id'];
        $newname = $_POST['new_name'];
        $newemail = $_POST['new_email'];

        $q = $db->prepare('UPDATE users SET user_name = :username, user_email = :useremail  WHERE user_id = :id');
        $q->bindValue(':id', $id);
        $q->bindValue(':username', $newname);
        $q->bindValue(':useremail', $newemail);
        $q->execute();
        $row = $q->fetch();
        echo 'Number of rows found: ' . $q->rowCount();
    } catch (PDOException $ex) {
        echo $ex;
        echo 'No dice! ';
        exit();
    }
}


if (!empty($_POST['new_name']) && empty($_POST['new_email'])) {
    try {

        //Internal Validation
        if (empty($_POST['new_name'])) {
            echo 'You need to enter a new_name for your account';
            exit();
        }
        if (strlen($_POST['new_name']) > 22) {
            echo "You name needs to be less than 22 characters";
            exit();
        }

        $id = $_SESSION['user_id'];
        $newname = $_POST['new_name'];

        $q = $db->prepare('UPDATE users SET user_name = :username WHERE user_id = :id');
        $q->bindValue(':id', $id);
        $q->bindValue(':username', $newname);
        $q->execute();
        $row = $q->fetch();
        echo 'Name has been changed: ' . $q->rowCount();
    } catch (PDOException $ex) {
        echo $ex;
        echo 'No dice! ';
        exit();
    }
}


if (empty($_POST['new_name']) && !empty($_POST['new_email'])) {
    try {
        $id = $_SESSION['user_id'];
        $newemail = $_POST['new_email'];

        $q = $db->prepare('UPDATE users SET user_email = :useremail  WHERE user_id = :id');
        $q->bindValue(':id', $id);
        $q->bindValue(':useremail', $newemail);
        $q->execute();
        $row = $q->fetch();
        echo 'Email has been changed: ' . $q->rowCount();
    } catch (PDOException $ex) {
        echo $ex;
        echo 'No dice! ';
        exit();
    }
}