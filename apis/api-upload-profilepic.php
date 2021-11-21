<?php
session_start();

//Validation - Avoid submit with no image selected
if (isset($_FILES["image"]) && !empty($_FILES["image"]["name"])) {
    if (is_uploaded_file($_FILES["image"]["tmp_name"]) && $_FILES["image"]["error"] === 0) {

        //Setting a varibale to simplify the code
        $item_id = $_SESSION['user_id'];

        //Removing the old profile pic
        unlink("../uploads/profilepics/img_" . $item_id);

        // Move the new image to the folder
        move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/profilepics/img_" . $item_id);

        //Echo Response
        echo "Photo has been uploaded";

        //Redirection to force refresh
        header('Location: ../update-user');
        exit();
    }
}



http_response_code(400);
echo 'Image file required';
exit();