<?php
session_start();

//Validation - Avoid submission with no image selected


if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {

    http_response_code(400);
    echo 'Image file required';
    exit();
} else {
    //Setting a varibale to simplify the code
    $item_id = $_SESSION['user_id'];

    //Removing the old profile pic
    unlink("../img/user/img_" . $item_id);

    // Move the new image to the folder
    move_uploaded_file($_FILES['image']['tmp_name'], "../img/user/img_" . $item_id);
}